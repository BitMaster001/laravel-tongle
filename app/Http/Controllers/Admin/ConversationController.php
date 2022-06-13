<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function get(Request $request){
        $user = Auth::user();
        if(!$user->admin){
            abort(401);
        }

        return view("admin.conversation");
    }

    public function getAdministratorMembers($rows = 10){
        $members = User::where('admin', '1');
        return $members->take($rows)->get();
    }

    public function getAllMembers(){
        $res = [];
        $strSQL = "SELECT users.id, users.username, users.gender, users.avatar, messages.thread_id FROM messages LEFT JOIN users ON messages.user_id = users.id ORDER BY messages.updated_at DESC";
        $rows = DB::select($strSQL);
        if(sizeof($rows) == 0){
            return $res;
        }

        foreach($rows as $row){
            $strSQL = "SELECT user_id FROM participants WHERE thread_id = ". $row->thread_id ." AND user_id != ". $row->id;
            $rs = DB::select($strSQL);
 
            if(sizeof($rs) == 0) continue;
            
            $strSQL = "SELECT id, admin, admin_message FROM users WHERE id = ". $rs[0]->user_id;
            $r = DB::select($strSQL);

            if(sizeof($r) == 0) continue;
            if($r[0]->admin == 1 && $r[0]->admin_message != ""){
                $isExist = false;
                foreach ($res as $value) {
                    if($value->id == $row->id) $isExist = true;
                }
                if(!$isExist){
                    array_push($res, $row);
                }
            }
        }
        return $res;
    }

    public function getMessage(Request $request){
        $strSQL = "SELECT a.thread_id FROM
                (SELECT thread_id FROM participants WHERE user_id = " . $request['user_id'] .") AS a
                JOIN (SELECT thread_id FROM participants WHERE user_id = " . $request['admin_id'] . ") AS b ON a.thread_id = b.thread_id";

        $rows = DB::select($strSQL);
        if(sizeof($rows) == 0){
            return response()->json('');
        }

        $strSQL = "SELECT a.body, b.username, a.updated_at FROM
        (SELECT * FROM messages WHERE thread_id = " . $rows[0]->thread_id . ") AS a
        LEFT JOIN users AS b ON a.user_id = b.id";

        $rows = DB::select($strSQL);
        $res = "";
        foreach($rows as $row){
            $res .= ($row->username .":\t");
            $res .= ($row->updated_at ."\n");
            $res .= ( "\t" . $row->body ."\n");
        }
        return response()->json($res);
    }

    public function saveMessage(Request $request){
        $strSQL = "SELECT a.thread_id FROM
                (SELECT thread_id FROM participants WHERE user_id = " . $request['user_id'] .") AS a
                JOIN (SELECT thread_id FROM participants WHERE user_id = " . $request['admin_id'] . ") AS b ON a.thread_id = b.thread_id";

        $rows = DB::select($strSQL);
        if(sizeof($rows) == 0){
            return response()->json('failed');
        }

        Message::create([
            'thread_id' => $rows[0]->thread_id,
            'user_id' => $request['admin_id'],
            'body' => $request['message'],
        ]);

        return response()->json('success');
    }
}

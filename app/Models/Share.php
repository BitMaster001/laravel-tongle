<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'sharein_type',
        'sharein_id',
        'shared_type',
        'shared_id',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = [
    ];

    public function sharein(){
        return $this->morphTo('sharein');
    }

    public function shared(){
        return $this->morphTo('shared');
    }

    public function scopeWhereSharein($query, $model)
    {
        return $query->where('sharein_id', $model->getKey())
            ->where('sharein_type', $model->getMorphClass());
    }

    public function scopeWhereShared($query, $model)
    {
        return $query->where('shared_id', $model->getKey())
            ->where('shared_type', $model->getMorphClass());
    }
}

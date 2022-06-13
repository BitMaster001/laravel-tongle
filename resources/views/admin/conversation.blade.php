@extends('layouts.app')

@section('title')
Conversation Management
@endsection

@php
$members = new App\Http\Controllers\Admin\ConversationController();
$adminMembers = $members->getAdministratorMembers(8);
$allMembers = $members->getAllMembers();
@endphp

@section('content')
<form class="form">
    <!-- SECTION BANNER -->
    <div class="section-banner section-banner-1">
        <!-- SECTION BANNER ICON -->
        <img class="section-banner-icon" src="/assets/img/banner/members-icon.png" alt="accounthub-icon">
        <!-- /SECTION BANNER ICON -->

        <!-- SECTION BANNER TITLE -->
        <p class="section-banner-title">Admin</p>
        <!-- /SECTION BANNER TITLE -->

        <!-- SECTION BANNER TEXT -->
        <p class="section-banner-text">conversation Managment</p>
        <!-- /SECTION BANNER TEXT -->
    </div>

    <!-- /SECTION BANNER -->

<!-- GRID -->
<div class="grid" style="grid-template-columns: 70px auto 90px; grid-gap: 10px">
    <!-- GRID COLUMN -->
    <div class="grid-column">
        <!-- WIDGET BOX -->
        <div class="widget-box" style="padding-left:2px;padding-right:2px;">
            <div class="widget-box-content">
                <div class="user-status-list">
                    @foreach($adminMembers as $member)
                    <!-- USER STATUS -->
                    <div style = "min-height:70px;">
                        <!-- USER STATUS AVATAR -->
                        <a class="user-status-avatar" id="{{$member->id}}" name="{{$member->username . '_admin'}}"  style="cursor:pointer" onclick="getCurrentAdminUser(name)"> 
                            <!-- USER AVATAR -->
                            <center>
                            <div class="user-avatar small no-outline">
                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-30-32" data-src="{{$member->avatar  ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->

                                <!-- USER AVATAR PROGRESS -->
                                <div class="user-avatar-progress">
                                    <!-- HEXAGON -->
                                    @if($member->gender == "Male")
                                    <div class="hexagon-progress-40-44-male"></div>
                                    @elseif($member->gender == "Female")
                                    <div class="hexagon-progress-40-44-female"></div>
                                    @elseif($member->gender == "Other")
                                    <div class="hexagon-progress-40-44-other"></div>
                                    @else
                                    <div class="hexagon-progress-40-44"></div>
                                    @endif
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR PROGRESS -->

                                <!-- USER AVATAR PROGRESS BORDER -->
                                <div class="user-avatar-progress-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-border-40-44"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR PROGRESS BORDER -->
                            </div>
                            <!-- /USER AVATAR -->
                            <!-- USER NAME -->
                            <p class="user-status-text small" style="text-align: center; word-wrap: break-word">{{$member->username}}</p>
                            <!-- /USER NAME -->
                        </center>
                        </a>
                        <!-- /USER STATUS AVATAR -->
                    </div>
                    <!-- /USER STATUS -->
                    @endforeach
                </div>
                <!-- /USER STATUS LIST -->

            </div>
            <!-- WIDGET BOX CONTENT -->
        </div>
        <!-- /WIDGET BOX -->
    </div>
    <!-- /GRID COLUMN -->
    <!-- GRID COLUMN -->
    <div class="grid-column" style="grid-template-rows: 60% 20% 10%;">
        <textarea id="message" name="message" placeholder="" rows="10"></textarea>
        <textarea id="reply" name="reply" placeholder="" rows="10"></textarea>
        <p class="button small secondary" onclick="saveAction()" style="width:20%; float:right;" id="save-message">send</p>
    </div>
    <div class="grid-column" style="height:600px">
        <!-- WIDGET BOX -->
        <div class="widget-box" style="padding-left:2px;padding-right:2px;overflow:hidden auto;height:550px">
            <div class="widget-box-content" style="margin-left: 0px;">
                <div class="user-status-list">
                    @foreach($allMembers as $member)
                    <!-- USER STATUS -->
                    <div style = "min-height:70px;">
                        <!-- USER STATUS AVATAR -->
                        <center>
                        <a class="user-status-avatar"  id="{{$member->id}}"  name="{{$member->username}}" style="cursor:pointer" onclick="getCurrentUser(name)">
                            <!-- USER AVATAR -->
                            <div class="user-avatar small no-outline">
                                <!-- USER AVATAR CONTENT -->
                                <div class="user-avatar-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-image-30-32" data-src="{{$member->avatar  ?? '/storage/default/user/profile/avatar.jpg'}}"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR CONTENT -->

                                <!-- USER AVATAR PROGRESS -->
                                <div class="user-avatar-progress">
                                    <!-- HEXAGON -->
                                    @if($member->gender == "Male")
                                    <div class="hexagon-progress-40-44-male"></div>
                                    @elseif($member->gender == "Female")
                                    <div class="hexagon-progress-40-44-female"></div>
                                    @elseif($member->gender == "Other")
                                    <div class="hexagon-progress-40-44-other"></div>
                                    @else
                                    <div class="hexagon-progress-40-44"></div>
                                    @endif
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR PROGRESS -->

                                <!-- USER AVATAR PROGRESS BORDER -->
                                <div class="user-avatar-progress-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-border-40-44"></div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR PROGRESS BORDER -->
                            </div>
                            <!-- /USER AVATAR -->
                            <!-- USER NAME -->
                            <p class="user-status-text small" style="text-align: center; word-wrap: break-word">{{$member->username}}</p>
                            <!-- /USER NAME -->
                        </a>
                        <!-- /USER STATUS AVATAR -->
                        </center>
                    </div>
                    <!-- /USER STATUS -->
                    @endforeach
                </div>
            </div>
            <!-- WIDGET BOX CONTENT -->
        </div>
    </div>
    <!-- /GRID COLUMN -->
</div>
<!-- /GRID -->
</form>

@endsection

@section('scripts')

<script>

    var adminname, username, admin_id, user_id;
    function getCurrentAdminUser(name) {
        let e = document.getElementsByName(adminname)[0];
        if(e != undefined){
            e.parentNode.style.border = null;
            e.parentNode.style.borderStyle = null;
        }

        e = document.getElementsByName(name)[0];
        e.parentNode.style.border = "#7750f8";
        e.parentNode.style.borderStyle = "solid";

        adminname = name;
        admin_id = e.id;

        showMessage();
    }

    function getCurrentUser(name) {
        let e = document.getElementsByName(username)[0];
        if(e != undefined){
            e.parentNode.style.border = null;
            e.parentNode.style.borderStyle = null;
        }

        e = document.getElementsByName(name)[0];
        e.parentNode.style.border = "#d451bd";
        e.parentNode.style.borderStyle = "solid";

        username = name;
        user_id = e.id;

        showMessage();
    }

    function showMessage(){
        if(adminname == undefined || username == undefined){
            return;
        }

        document.getElementById('reply').value = '';
        let data = {};
        data['admin_id'] = admin_id;
        data['user_id'] = user_id;

        fetchApi("/admin/conversation/getMessage", "post", data, function(xhr) {
            document.getElementById("message").value = JSON.parse(xhr.response);
        });
    }

    function saveAction() {
        let data = {};
        data['message'] = document.getElementById('reply').value;
        data['admin_id'] = admin_id;
        data['user_id'] = user_id;

        fetchApi("/admin/conversation/saveMessage", "post", data, function(xhr) {
            if (JSON.parse(xhr.response) == "success") {
                ShowSuccess("message saved successfully!");
            } else {
                ShowDanger("message saving failed.");
            }

            showMessage();
        });
    }
</script>
@endsection

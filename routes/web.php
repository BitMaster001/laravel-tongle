<?php

use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\ConversationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Home\EventController;
use App\Http\Controllers\Home\ForumController;
use App\Http\Controllers\Home\GroupController;
use App\Http\Controllers\Home\GroupshipController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\MarketplaceController;
use App\Http\Controllers\Home\MapSearchController;
use App\Http\Controllers\Home\MemberController;
use App\Http\Controllers\Home\User\FriendshipController;
use App\Http\Controllers\Home\User\Profile\AboutController;
use App\Http\Controllers\Home\User\Profile\BlogController;
use App\Http\Controllers\Home\User\Profile\FriendsController;
use App\Http\Controllers\Home\User\Profile\ProfileController;
use App\Http\Controllers\Home\User\Profile\Settings\ChangePasswordController;
use App\Http\Controllers\Home\User\Profile\Settings\FriendRequestsController;
use App\Http\Controllers\Home\User\Profile\Settings\GeneralSettingsController;
use App\Http\Controllers\Home\User\Profile\Settings\ManageGroupsController;
use App\Http\Controllers\Home\User\Profile\Settings\ManageStoreController;
use App\Http\Controllers\Home\User\Profile\Settings\ProfileInfoController;
use App\Http\Controllers\Home\User\Profile\Settings\SocialStreamController;
use App\Http\Controllers\Home\User\Profile\StoreController;
use App\Http\Controllers\Home\User\Stream\StreamController;
use App\Http\Controllers\Widget\Comments\CommentsController;
use App\Http\Controllers\Widget\Messages\MessagesController;
use App\Http\Controllers\Widget\Posts\PostsController;
use App\Http\Controllers\Widget\Reactions\ReactionsController;
use App\Http\Controllers\Widget\Search\SearchController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login
Route::get('/login', [LoginController::class, 'get'])->name('loginGet');
Route::post('/login', [LoginController::class, 'post'])->name('loginPost');
Route::get('/logout', [LoginController::class, 'getLogout'])->name('logoutGet');

Route::get('/login/{platform}/redirect', [LoginController::class, 'getRedirect'])->name('loginRedirectGet');
Route::get('/login/{platform}/callback', [LoginController::class, 'getCallback'])->name('loginCallbackGet');

//Register
Route::get('/register', [RegisterController::class, 'get'])->name('registerGet');
Route::post('/register', [RegisterController::class, 'post'])->name('registerPost');


//Email Verification
Route::get('/email/verify', [RegisterController::class, 'getVerifyNotice'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'getVerify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [RegisterController::class, 'postVerify'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');



//Reset Password
Route::get('/reset-password', [ResetPasswordController::class, 'get'])->name('resetPasswordGet');
Route::post('/reset-password/link', [ResetPasswordController::class, 'post'])->name('resetPasswordPost');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getReset'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'postReset'])->name('password.update');

//Home
Route::get('/', [HomeController::class, 'get'])->name('homeGet');

Route::group(['middleware' => ['auth', 'verified']], function () {

    //User Profile
    Route::get('/profile', [ProfileController::class, 'get'])->name('userProfileGet');
    Route::get('/about', [AboutController::class, 'get'])->name('userAboutGet');

    //User Public Profile
    Route::get('/profile/{user}', [ProfileController::class, 'getUser'])->name('userPublicProfileGet');
    Route::get('/profile/{user}/about', [AboutController::class, 'getUser'])->name('userPublicAboutGet');

    //User Friends
    Route::get('/friends', [FriendsController::class, 'get'])->name('userFriendsGet');
    Route::get('/profile/{user}/friends', [FriendsController::class, 'getUser'])->name('userPublicFriendsGet');

    //User Groups
    Route::get('/groups', [GroupController::class, 'get'])->name('userGroupsGet');
    Route::get('/profile/{user}/groups', [GroupController::class, 'getUser'])->name('userPublicGroupsGet');

    //User Events
    Route::get('/event', [EventController::class, 'getUserEvent'])->name('getUserEvent');
    Route::get('/profile/{user}/event', [EventController::class, 'getPublicUserEvent'])->name('getPublicUserEvent');

    //User Store
    Route::get('/store', [StoreController::class, 'get'])->name('userStoreGet');
    Route::get('/profile/{user}/store', [StoreController::class, 'getUser'])->name('userPublicStoreGet');

    //Users Friendship
    Route::get('/friendship/{user}/add', [FriendshipController::class, 'getFriendshipAdd'])->name('userFriendshipAddGet');
    Route::get('/friendship/{user}/cancel', [FriendshipController::class, 'getFriendshipCancel'])->name('userFriendshipCancelGet');
    Route::get('/friendship/{user}/accept', [FriendshipController::class, 'getFriendshipAccept'])->name('userFriendshipAcceptGet');
    Route::get('/friendship/{user}/denied', [FriendshipController::class, 'getFriendshipDenied'])->name('userFriendshipDeniedGet');
    Route::get('/friendship/{user}/block', [FriendshipController::class, 'getFriendshipBlock'])->name('userFriendshipBlockGet');
    Route::get('/friendship/{user}/unblock', [FriendshipController::class, 'getFriendshipUnblock'])->name('userFriendshipUnblockGet');
    Route::get('/friendship/{user}/unfriend', [FriendshipController::class, 'getFriendshipUnfriend'])->name('userFriendshipUnfriendGet');

    //User Messages
    Route::get('/account-hub/messages', [MessagesController::class, 'get'])->name('settingsMessagesGet');

    Route::get('/messages/get', [MessagesController::class, 'postMessagesGet'])->name('userMessagesGet');
    Route::post('/messages/{user}/add', [MessagesController::class, 'postMessageAdd'])->name('userMessageAdd');
    Route::post('/messages/{user}/get', [MessagesController::class, 'postLastMessagesGet'])->name('userLastMessagesGet');
    Route::post('/messages/update', [MessagesController::class, 'postLastMessagesCheck'])->name('userLastMessagesCheck');
    Route::post('/messages/{user}/contactnofriend', [MessagesController::class, 'postContactNoFriendGet'])->name('userContactNoFriendGet');
    Route::get('/messages/{user}/delete', [MessagesController::class, 'postMessageDelete'])->name('userMessageDelete');

    //User Posts
    Route::post('/posts/gettagedfriends', [PostsController::class, 'getTagedFriends'])->name('getTagedFriends');

    Route::post('/posts/add', [PostsController::class, 'add'])->name('addPosts');

    Route::post('/posts/share', [PostsController::class, 'share'])->name('sharePosts');

    Route::post('/newsfeed/posts', [PostsController::class, 'getNewsfeedPost'])->name('getNewsfeedPost');
    Route::post('/newsfeed/delete', [PostsController::class, 'newsfeedDelete'])->name('newsfeedDelete');
    Route::post('/newsfeed/vote', [PostsController::class, 'newsfeedVote'])->name('newsfeedVote');

    //User Comments
    Route::post('/comments/get', [CommentsController::class, 'get'])->name('getComments');
    Route::post('/comments/add', [CommentsController::class, 'add'])->name('addComments');

    //User Reactions
    Route::post('/reactions/add', [ReactionsController::class, 'add'])->name('addReactions');
    Route::post('/reactions/delete', [ReactionsController::class, 'delete'])->name('deleteReactions');

    //User Settings Profile Info
    Route::get('/account-hub/profile-info', [ProfileInfoController::class, 'get'])->name('settingsProfileInfoGet');
    Route::post('/account-hub/profile-info', [ProfileInfoController::class, 'post'])->name('settingsProfileInfoPost');

    //User Settings Social & Stream
    Route::get('/account-hub/social-stream', [SocialStreamController::class, 'get'])->name('settingsSocialStreamGet');
    Route::post('/account-hub/social-stream', [SocialStreamController::class, 'post'])->name('settingsSocialStreamPost');

    //User Settings Change Password
    Route::get('/account-hub/change-password', [ChangePasswordController::class, 'get'])->name('settingsChangePasswordGet');
    Route::post('/account-hub/change-password', [ChangePasswordController::class, 'post'])->name('settingsChangePasswordPost');
    Route::get('/account-hub/change-password/reset', [ChangePasswordController::class, 'getReste'])->name('settingsChangePasswordResetGet');

    //User Settings General Settings
    Route::get('/account-hub/general-settings', [GeneralSettingsController::class, 'get'])->name('settingsGeneralSettingsGet');
    Route::post('/account-hub/general-settings', [GeneralSettingsController::class, 'post'])->name('settingsGeneralSettingsPost');

    //User Settings Friend Requests
    Route::get('/account-hub/friend-requests', [FriendRequestsController::class, 'get'])->name('settingsFriendRequestsGet');

    //User Settings Manage Groups
    Route::get('/account-hub/manage-groups', [ManageGroupsController::class, 'get'])->name('settingsManageGroupsGet');

    Route::get('/account-hub/invitations', [ManageGroupsController::class, 'invitations'])->name('settingsInvitationsGet');

    Route::get('/account-hub/manage-groups/new', [ManageGroupsController::class, 'new'])->name('settingsManageGroupsNewGet');

    Route::get('/account-hub/manage-groups/{group}/manage', [ManageGroupsController::class, 'manage'])->name('settingsManageGroupsManageGet');
    Route::get('/account-hub/manage-groups/{group}/members', [ManageGroupsController::class, 'members'])->name('settingsManageGroupsMembersGet');

    Route::get('/account-hub/manage-groups/{group}/delete', [ManageGroupsController::class, 'delete'])->name('settingsManageGroupsDeleteGet');

    Route::post('/account-hub/manage-groups/edit', [ManageGroupsController::class, 'edit'])->name('settingsManageGroupsEditPost');

    //User Settings Manage Store
    Route::get('/account-hub/manage-store', [ManageStoreController::class, 'get'])->name('settingsManageStoreGet');

    Route::get('/account-hub/manage-store/new', [ManageStoreController::class, 'new'])->name('settingsManageStoreNewGet');
    
    Route::get('/account-hub/manage-store/global/delete', [ManageStoreController::class, 'globalDelete'])->name('settingsManageStoreGlobalDeleteGet');

    Route::get('/account-hub/manage-store/{item}/manage', [ManageStoreController::class, 'manage'])->name('settingsManageStoreManageGet');

    Route::get('/account-hub/manage-store/{item}/delete', [ManageStoreController::class, 'delete'])->name('settingsManageStoreDeleteGet');
    

    Route::post('/account-hub/manage-store/edit', [ManageStoreController::class, 'edit'])->name('settingsManageStoreEditPost');

    //Widget Search
    Route::post('/widget/search', [SearchController::class, 'post'])->name('widgetSearchPost');

    //Group Public Profile
    Route::get('/groups/{group}', [GroupController::class, 'getGroup'])->name('groupGet');
    Route::get('/groups/{group}/info', [GroupController::class, 'getGroupInfo'])->name('groupInfoGet');
    Route::get('/groups/{group}/members', [GroupController::class, 'getGroupMembers'])->name('groupMembersGet');
    Route::get('/groups/{group}/events', [GroupController::class, 'getGroupEvents'])->name('groupEventsGet');

    //Users Groupship
    Route::get('/groupship/{group}/add', [GroupshipController::class, 'getGroupshipAdd'])->name('userGroupshipAddGet');
    Route::get('/groupship/{group}/invite', [GroupshipController::class, 'getGroupshipInvite'])->name('userGroupshipInviteGet');
    Route::get('/groupship/{groupship}/cancel', [GroupshipController::class, 'getGroupshipCancel'])->name('userGroupshipCancelGet');
    Route::get('/groupship/{groupship}/accept', [GroupshipController::class, 'getGroupshipAccept'])->name('userGroupshipAcceptGet');
    Route::get('/groupship/{groupship}/denied', [GroupshipController::class, 'getGroupshipDenied'])->name('userGroupshipDeniedGet');
    Route::get('/groupship/{groupship}/leave', [GroupshipController::class, 'getGroupshipLeave'])->name('userGroupshipLeaveGet');
    Route::get('/groupship/{groupship}/approve', [GroupshipController::class, 'getGroupshipApprove'])->name('userGroupshipApproveGet');
    Route::get('/groupship/{groupship}/delete', [GroupshipController::class, 'getGroupshipDelete'])->name('userGroupshipDeleteGet');
    Route::get('/groupship/{groupship}/block', [GroupshipController::class, 'getGroupshipBlock'])->name('userGroupshipBlockGet');
    Route::get('/groupship/{groupship}/unblock', [GroupshipController::class, 'getGroupshipUnblock'])->name('userGroupshipUnblockGet');

    //Marketplace
    Route::get('/marketplace', [MarketplaceController::class, 'getMarketplace'])->name('getMarketplace');
    Route::get('/marketplace/{categorie}', [MarketplaceController::class, 'getMarketplaceCategorie'])->name('getMarketplaceCategorie');
    Route::get('/marketplace/{categorie}/{item}', [MarketplaceController::class, 'getMarketplaceItem'])->name('getMarketplaceItem');

    //MapSearch
    Route::get('/map-search', [MapSearchController::class, 'getMapSearch'])->name('getMapSearch');
    Route::post('/map-search/ajax/location', [MapSearchController::class, 'updateUserCoordinates'])->name('location.update');

    //Forms
    Route::get('/forums/{categorie}/new', [ForumController::class, 'getForumNewPost'])->name('getForumNewPost');
    Route::get('/forums/{categorie}/{post}/manage', [ForumController::class, 'getForumManagePost'])->name('getForumManagePost');
    Route::get('/forums/{categorie}/{post}/delete', [ForumController::class, 'getForumDeletePost'])->name('getForumDeletePost');

    Route::post('/forums/{categorie}/edit', [ForumController::class, 'edit'])->name('getForumManagePostEdit');

    Route::get('/forums', [ForumController::class, 'getForum'])->name('getForum');
    Route::get('/forums/{categorie}', [ForumController::class, 'getForumCategorie'])->name('getForumCategorie');
    Route::get('/forums/{categorie}/{post}', [ForumController::class, 'getForumPost'])->name('getForumPost');

    Route::post('/forums/{categorie}/{post}/comment', [ForumController::class, 'comment'])->name('getForumPostComment');
    Route::get('/forums/{categorie}/{post}/{comment}/delete', [ForumController::class, 'deleteComment'])->name('getForumDeleteComment');

    Route::get('/forums/{categorie}/{post}/vote', [ForumController::class, 'vote'])->name('getForumPostVote');

    //Events
    Route::get('/events', [EventController::class, 'getEvent'])->name('getEvent');
    Route::get('/events/new', [EventController::class, 'getNewEvent'])->name('getNewEvent');
    Route::get('/events/search', [EventController::class, 'getEventSearch'])->name('getEventSearch');
    Route::post('/events/edit', [EventController::class, 'getEventEdit'])->name('getEventEdit');
    Route::get('/events/{event}', [EventController::class, 'getViewEvent'])->name('getViewEvent');
    Route::get('/events/{event}/manage', [EventController::class, 'getViewEventManage'])->name('getViewEventManage');
    Route::get('/events/{event}/delete', [EventController::class, 'getEventDelete'])->name('getEventDelete');
    Route::get('/events/images/{image}/delete', [EventController::class, 'getEventImageDelete'])->name('getEventImageDelete');
    Route::get('/events/{event}/add', [EventController::class, 'getEventAdd'])->name('getEventAdd');
    Route::get('/events/{event}/remove', [EventController::class, 'getEventRemove'])->name('getEventRemove');
    Route::get('/groups/{group}/events/new', [EventController::class, 'getGroupNewEvent'])->name('getGroupNewEvent');

    //Stream
    Route::get('test-stream', [StreamController::class, 'testStream']);
    Route::get('test-stream-fire', [StreamController::class, 'testStreamFire']);

    Route::get('/stream', [StreamController::class, 'stream'])->name('stream');
    Route::get('/profile/{user}/stream', [StreamController::class, 'userStream'])->name('userStream');

    Route::post('/pusher/auth', [StreamController::class, 'authenticate']);

    //blog
    Route::get('/blog', [BlogController::class, 'get'])->name('getBlogs');
    Route::get('/profile/{user}/blog', [BlogController::class, 'getUser'])->name('getUserBlogs');
    Route::get('/blog/{blog}', [BlogController::class, 'getBlog'])->name('getBlog');
    Route::get('/profile/{user}/blog/{blog}', [BlogController::class, 'getUserBlog'])->name('getUserBlog');

    //all groups
    Route::get('/all-groups', [GroupController::class, 'getGroups'])->name('getGroups');

    //all members
    Route::get('/members', [MemberController::class, 'getMembers'])->name('getMembers');

    //admin user management
    Route::get('/admin/user-management', [UserManagementController::class, 'get'])->name('getUserManagement');
    Route::get('/admin/user-management/{user}/add-admin', [UserManagementController::class, 'addAdmin'])->name('getUserManagementAddAdmin');
    Route::get('/admin/user-management/{user}/remove-admin', [UserManagementController::class, 'removeAdmin'])->name('getUserManagementRemoveAdmin');
    Route::get('/admin/user-management/{user}/unblock', [UserManagementController::class, 'unblock'])->name('getUserManagementUnblock');
    Route::get('/admin/user-management/{user}/block', [UserManagementController::class, 'block'])->name('getUserManagementBlock');
    Route::get('/admin/user-management/{user}/delete', [UserManagementController::class, 'delete'])->name('getUserManagementDelete');

    //admin message management
    Route::get('/admin/admin-message', [AdminMessageController::class, 'get'])->name('getAdminMessage');
    Route::post('/admin/admin-message/save', [AdminMessageController::class, 'save'])->name('saveAdminMessage');

    //admin conversation management
    Route::get('/admin/conversation', [ConversationController::class, 'get'])->name('getConversation');
    Route::post('/admin/conversation/saveMessage', [ConversationController::class, 'saveMessage'])->name('saveConversationMessage');
    Route::post('/admin/conversation/getMessage', [ConversationController::class, 'getMessage'])->name('getConversationMessage');

    Route::get('/test/video', function (){
        return view('home.test');
    });

});

//Route::get('/run-migrate', function (){
//    Artisan::call('migrate');
//});
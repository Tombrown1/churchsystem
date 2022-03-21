<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\subUnitController;
use App\Http\Controllers\manageMemberController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'index'])->name('index')->middleware('posting.expire');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/announce-page/{id}', [PageController::class, 'announcement'])->name('announce.page');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

    Route::group(['prefix' => 'user', 'middleware' => ['auth', 'isuser']], function()
    {
        Route::get('/dashboard', [UserHomeController::class, 'home'])->name('home');
        Route::get('/my-profile/{id}', [UserHomeController::class, 'myprofile'])->name('user.myprofile');
        Route::get('/annoucement', [UserHomeController::class, 'annoucement'])->name('annoucement');
        Route::get('/activity', [UserHomeController::class, 'activities'])->name('activity');
        Route::get('/gallery', [UserHomeController::class, 'gallery'])->name('gallery');
        Route::get('/suggestion', [UserHomeController::class, 'suggestion'])->name('suggestion');
    });


    // Middleware Group with Name Prefix route that controls admin users

    Route::group(['prefix' => 'admin','middleware' => ['auth', 'isadmin']], function () 
    {

    // Route::get('/profile/{id}',[DemoController::class, 'show'])->name('profile');
        // route that helps in inserting user details records
    Route::post('/personal-detail/{id}',[UserDetailController::class, 'personaldetail'])->name('personal.detail');
    Route::get('/profile/{id}',[UserDetailController::class, 'userProfile'])->name('admin.profile');    
    Route::get('/times-posted/{id}',[UserDetailController::class, 'post_count'])->name('times.posted');    
    Route::post('/nextofkin/{id}',[UserDetailController::class, 'nextofkin'])->name('nextofkin.detail');
    Route::post('/workpro/{id}',[UserDetailController::class, 'workprofession'])->name('workpro.detail');
        // route that helps in editing user details records

    Route::get('/edit-user-personal-detail/{id}', [UserDetailController::class, 'edit_user_personal_detail'])->name('edit.personal.detail');
    Route::put('/update-personal-detail/{id}', [UserDetailController::class, 'update_personal_detail'])->name('update.personal.detail');
    Route::put('/update-nextofkin/{id}', [UserDetailController::class, 'update_nextofkin'])->name('update.nextofkin');
    Route::put('/update-workpro/{id}', [UserDetailController::class, 'updateworkpro'])->name('update.workpro');
    Route::put('/update-churchmember/{id}', [UserDetailController::class, 'updatechurchmember'])->name('update.churchmember');

    //Posting Route
    Route::post('/member-Post', [manageMemberController::class, 'posting'])->name('post.member');
    Route::get('/posted-members', [manageMemberController::class, 'posted_member'])->name('post');
    Route::get('/expired-posted-members', [manageMemberController::class, 'expired_posting'])->name('posting.expired');
    Route::post('/terminate/{id}', [manageMemberController::class, 'terminate'])->name('terminate.member');


    Route::post('/churchmembership/{id}',[UserDetailController::class, 'churchmember'])->name('churchmember.detail');
    Route::post('/create-user',[ManageUserController::class, 'createUser'])->name('create.user');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/manage-user', [ManageUserController::class, 'ManageUser'])->name('manage.user');
    Route::get('/cable',   [subUnitController::class, 'cableSubunit'])->name('cable');
    Route::get('/camera',  [subUnitController::class, 'cameraSubunit'])->name('camera');
    Route::get('/console', [subUnitController::class, 'consoleSubunit'])->name('console');
    Route::get('/prosale', [subUnitController::class, 'prosaleSubunit'])->name('prosale');
    Route::get('/members', [manageMemberController::class, 'manageMember'])->name('members');
    Route::get('/profile', [UserDetailController::class, 'profile'])->name('profile');
    Route::get('/announcement', [NewsEventController::class, 'announcement'])->name('announce');
    Route::post('/create-category', [NewsEventController::class, 'announcement_category'])->name('create.cat');
    Route::post('/create-announcement', [NewsEventController::class, 'save_announce'])->name('create.announce');
    Route::get('/view-announcement/{id}', [NewsEventController::class, 'view_announcement'])->name('view.announcement');
    Route::post('/edit-announce/{id}', [NewsEventController::class, 'edit_announce'])->name('edit.announce');
    Route::post('/save-gallery-image', [NewsEventController::class, 'save_gallery_photo'])->name('save.gallery.image');
    Route::post('/update-gallery/{id}', [NewsEventController::class, 'update_gallery'])->name('update.gallery');
    
    Route::get('/photo-gallery', [NewsEventController::class, 'photo_gallery'])->name('photo.gallery');  

    Route::post('/photo-category', [NewsEventController::class, 'gallery_category'])->name('photo.category');
    //Manage Image Slider routes
    Route::get('/slider', [NewsEventController::class, 'image_slider'])->name('slider');
    Route::post('/slider', [NewsEventController::class, 'save_slider'])->name('save.slider');
    Route::post('/update-slider/{id}', [NewsEventController::class, 'update_slider'])->name('update.slider');
    Route::delete('/delslide/{id}', [NewsEventController::class, 'delete_slide'])->name('del.slide');
    //Delete User route
    Route::delete('/delete/{id}', [ManageUserController::class, 'deluser'])->name('user.delete');

    });
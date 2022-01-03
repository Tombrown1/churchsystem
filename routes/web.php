<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\subUnitController;
use App\Http\Controllers\manageMemberController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserDetailController;
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

Route::get('/', [PageController::class, 'index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

    Route::group(['prefix' => 'user', 'middleware' => ['auth', 'isuser']], function()
    {
        Route::get('/dashboard', [UserHomeController::class, 'home'])->name('home');
        Route::get('/profile', [UserHomeController::class, 'profile'])->name('user.profile');
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
    Route::post('/personal-detail',[UserDetailController::class, 'personaldetail'])->name('personal.detail');
    Route::get('/profile/{id}',[UserDetailController::class, 'userProfile'])->name('admin.profile');    
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


    //Delete User route
    Route::delete('/delete/{id}', [ManageUserController::class, 'deluser'])->name('user.delete');

    });
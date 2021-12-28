<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;

class manageMemberController extends Controller
{
    public function manageMember()
    {        
        // $userdetail = User::find(1)->userdetail->lastname;
        // return $userdetail->user->name;
        // $userdetail->userdetail()->find('2');
        // $userdetail = UserDetail::where('user_id', $user->id)->get();
        // return $userdetail;
        $users = User::get();
        
        return view('admin.manageMember', compact('users'));
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserHomeController extends Controller
{
    public function home()
    {
        return view('users.home');
    }

    public function myprofile($id)
    {
        $user = User::find($id);
        // return $user;
        return view('users.profile', compact('user'));
    }

    public function annoucement()
    {
        return view('users.annoucement');
    }

    public function activities()
    {
        return view('users.activities');
    }

    public function gallery()
    {
        return view('users.gallery');
    }

    public function suggestion()
    {
        return view('users.suggestion');
    }
}

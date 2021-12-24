<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function home()
    {
        return view('users.home');
    }

    public function profile()
    {
        return view('users.profile');
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

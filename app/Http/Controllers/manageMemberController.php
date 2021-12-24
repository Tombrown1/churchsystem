<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manageMemberController extends Controller
{
    public function manageMember()
    {
        
        return view('admin.manageMember');
    }

    
}

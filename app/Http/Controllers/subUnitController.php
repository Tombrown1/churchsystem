<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting;
use App\Models\User;

class subUnitController extends Controller
{
   public function cableSubunit()
   {
       return view('admin.cable_subunit');
   }

   public function cameraSubunit()
   {
       $camera_posted_member = Posting::where('subunit_id', 2)->with('user')->get();
    //    return $camera_posted_member;
       return view('admin.camera_subunit', compact('camera_posted_member'));
   }

   public function consoleSubunit()
   {
       return view('admin.console_subunit');
   }

   public function prosaleSubunit()
   {
       return view('admin.prosale_subunit');
   }
}

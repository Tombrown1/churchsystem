<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class subUnitController extends Controller
{
   public function cableSubunit()
   {
       return view('admin.cable_subunit');
   }

   public function cameraSubunit()
   {
       return view('admin.camera_subunit');
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

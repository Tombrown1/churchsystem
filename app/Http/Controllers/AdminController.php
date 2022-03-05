<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting;

class AdminController extends Controller
{
    public function index()
    {
        $posted_cable_mem = Posting::with('user')->where('subunit_id', 1)->get();
        $posted_camera_mem = Posting::with('user')->where('subunit_id', 2)->get();
        $posted_console_mem = Posting::with('user')->where('subunit_id', 3)->get();
        $posted_prosale_mem = Posting::with('user')->where('subunit_id', 4)->get();
        $count_cable = $posted_cable_mem->count();
        $count_camera = $posted_camera_mem->count();
        $count_console = $posted_console_mem->count();
        $count_prosale = $posted_prosale_mem->count();
        // return $count_mem;
        return view('admin.dashboard', ['count_cable'=>$count_cable,
                                        'count_camera'=> $count_camera,
                                        'count_console'=> $count_console,
                                        'count_prosale'=> $count_prosale
                                       ]);
    }
}

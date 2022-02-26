<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;

class PageController extends Controller
{
    public function index()
    {
        $announcement = announcement::get();
        // return $announcement;
        return view('page.index', compact('announcement'));
    }

    public function gallery()
    {
        return view('page.gallery');
    }

    public function photo_gallery()
    {
        return view('admin.photo_gallery');
    }
}

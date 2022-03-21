<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;
use App\Models\AnnoucementCategory;

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

    public function announcement($id)
    {
        $view_announce = announcement::find($id);
        $announce_cate = AnnoucementCategory::get();
        // return $announce_cat;
        return view('page.announcement', compact('view_announce', 'announce_cate'));
    }
}

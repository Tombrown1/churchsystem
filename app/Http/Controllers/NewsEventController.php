<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\AnnoucementCategory;
use App\Models\announcement;
use Auth;

class NewsEventController extends Controller
{
    public function announcement()
    {   
        $announce_cat = AnnoucementCategory::get();
        // return $announce_cat; 
        return view('admin.announcement', compact('announce_cat'));
    }

    public function announcement_category(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        // return $request;

        $announ_cat = new AnnoucementCategory;

        $announ_cat->name = $request->name;
        $announ_cat->description = $request->description;

        if($announ_cat->save())
        {
            return back()->with('message', 'Announcement Category added sucessfully!');
        }
    }

    public function save_announce(Request $request)
    {
        $this->validate($request, [
            'cat_id' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);
        $user_id = Auth::User()->id;
        // return $request;

        $announce = new announcement;

        $announce->user_id = $user_id;
        $announce->annouce_cat_id = $request->cat_id;
        $announce->title = $request->title;
        $announce->message = $request->message;

        // return $announce;
        if($announce->save())
        {
            return back()->with('message', "Announcement Created Successfully!");
        }

    }
}

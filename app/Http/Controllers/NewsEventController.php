<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\AnnoucementCategory;
use App\Models\announcement;
use Storage;
use Auth;

class NewsEventController extends Controller
{
    public function announcement()
    {   
        $announce_cat = AnnoucementCategory::get();
        $announcement = announcement::with(['announce_cat','user'])->orderBy('id', 'DESC')->get();
        // return $announcement; 
        return view('admin.announcement', compact('announce_cat', 'announcement'));
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

            // Script for image Validation;
        if($request->hasfile('image')){
            $request->validate([
                'image' => 'required',
                'image' => 'mimes:png,jpg,pdf,jpeg,gif|max:2048'
            ]);

            $file = $request->file('image');
            $path = Storage::disk('public')->putFile('announcement', $file);
            $announce->image = $path;
        }

        // return $announce;
        if($announce->save())
        {
            return back()->with('message', "Announcement Created Successfully!");
        }

    }
}

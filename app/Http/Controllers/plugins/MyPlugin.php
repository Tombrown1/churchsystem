<?php

namespace App\Http\Controllers\plugins;

use App\Models\Posting;
use App\Models\TrackPosting;
use App\Models\User;

class MyPlugin
{
    public function expirePosting(){
        $currentDate = date('Y-m-d');
        $postings = Posting::where('end_date', $currentDate)->get();

        foreach ($postings as $post) {
             //transfer posting data to track posting first 1
             $tp = new TrackPosting;

             $tp->user_id = $post->user_id;
             $tp->member_id = $post->member_id;
             $tp->subunit_id = $post->subunit_id;
             $tp->posting_status = $post->posting_status;
             $tp->duration = $post->duration;
             $tp->start_date = $post->start_date;
             $tp->expired_at = $post->end_date;
             $tp->start_date = $post->start_date;

             //save data
             $tp->save();
             // this query update is_posted field in user table to zero, and 
             // user becomes available for reposting after posting duration has expired
             $user = Posting::find($post->user_id);

            //  return $user;

             $user->is_posted = 0;

             $user->update();
             // Remove user whose duration has expired from posting table!
             $remove_posted_user = Posting::find($post->id);
             $remove_posted_user->delete();
        }
    }
}

<?php

namespace App\Http\Controllers\plugins;

use App\Models\Posting;
use App\Models\TrackPosting;
use App\Models\User;
use DateTime;

class MyPlugin
{
    public function expirePosting(){
        $currentDate = date('Y-m-d', strtotime('now'));
        // return $currentDate;
        $postings = Posting::where('end_date','>=', $currentDate)->get();

        $count = count($postings);

        if($count > 0){
            foreach ($postings as $post) {
                //Format it into a Unix timestamp.
                $currentDateTimestamp = new DateTime($currentDate);
                $endDateTimestamp = new DateTime($post->end_date);                
                $todaysTimestamp = $currentDateTimestamp->format('U');
                $endTimestampe = $endDateTimestamp->format('U');

                if($todaysTimestamp >= $endTimestampe){
                        
                //transfer posting data to track posting first 1
                $tp = new TrackPosting;
                
                
                
                $tp->user_id = $post->user_id;
                $tp->member_id = $post->member_id;
                $tp->subunit_id = $post->subunit_id;
                $tp->posting_status = $post->posting_status;
                $tp->duration = $post->duration;
                $tp->start_date = $post->start_date;
                $tp->expired_at = $post->end_date;
                // $tp->start_date = $post->start_date;

                // return $tp; 
              
   
                //save data
                $tp->save();
                // this query update is_posted field in user table to zero, and 
                // user becomes available for reposting after posting duration has expired
                $user = User::find($post->member_id);
   
                // return $user;
   
                $user->is_posted = 0;
   
                $user->update();
                // Remove user whose duration has expired from posting table!
                $remove_posted_user = Posting::find($post->id);
                
                $remove_posted_user->delete();
                }
           }
        }

        
    }
}

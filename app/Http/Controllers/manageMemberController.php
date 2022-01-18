<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Posting;
use Carbon\Carbon;
use Auth;
use DateTime;

class manageMemberController extends Controller
{
    public function manageMember()
    {        
        // $userdetail = User::find(1)->userdetail->lastname;
        // return $userdetail->user->name;
        // $userdetail->userdetail()->find('2');
        // $userdetail = UserDetail::where('user_id', $user->id)->get();
        // return $userdetail;

        //by victor 
        $users = UserDetail::with(['posting', 'user'])->orderBy("id", 'DESC')->get();

        // return $users;
        // return $posted_by->user->name;
       // $members = User::get();
        //$users =  User::with(['userdetail', 'postings'])->orderBy("id", 'DESC')->get(); 
        //$users = User::with('userdetail')->orderBy("id","DESC")->get(); 
        // $user = User::find(3)->userdetail;

        return view('admin.manageMember', compact('users'));
    }


    public function posting(Request $request)
    {
        $this->validate($request, [
            'member_id' => 'required',
            'subunit_id' => 'required',
            'posting_status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        // return $request;

        // $start_date = Carbon::parse($request->start_date);
        // $end_date = Carbon::parse($request->end_date);
        // $duration = $end_date->diffForHumans($start_date);

    //     $start_date = strtotime($request->start_date);
    //     $end_date = strtotime($request->end_date);
    //     $post_duration = ($end_date - $start_date);
    //     $dataing = date("t", strtotime($post_duration
    // ));
    //    return $dataing;

        $start_date = new DateTime($request->start_date);
        $end_date = new DateTime($request->end_date);
        $duration = $end_date->diff($start_date);
        
    //    return $duration->format('%m months, %d days');

        //return $post_duration;
        //  $duration =  date('F j, Y', $date_diff);
        // $duration =  date('D M Y', $date_diff);
        

        
                
        $posted_by = Auth::user()->id;
        $post = new Posting;

        $post->user_id = $posted_by;
        $post->member_id = $request->member_id;
        $post->subunit_id = $request->subunit_id;
        $post->posting_status = $request->posting_status;
        $post->duration = $duration->format('%m months, %d days');
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;

        // return $post;

        if($post->save())
        {
            // return $post->with('details')->get();
            $redirect = 'admin/posted-members';
            return redirect($redirect)->with('message', 'Posting Done!');
        }        
    }    
   
    public function posted_member()
    {
        $members_posted = Posting::with('user', 'subunit')->orderBy('id', 'DESC')->get();
        // return $members_posted;
        // return $members_posted->user->userdetail;
        return view('admin.posting', compact('members_posted'));
    }

    // public function time_duration($post_duration)
    // {
    //     $time_difference = time() - $post_duration;
    //     $seconds = $time_difference;
    //     $minutes = round($time_difference/60);
    //     $hours = round($time_difference/3600);
    //     $days = round($time_difference/86400);
    //     $weeks = round($time_difference/604800);
    //     $months = round($time_difference/2419200);
    //     $years = round($time_difference/29030400);

    //     if($seconds <= 60)
    //     {
    //         return array('type'=>'secs', 'time' => $seconds);
    //     }elseif($minutes <= 60)
    //     {
    //         if($minutes == 1)
    //         {
    //             return array('type' => 'mins', 'time' => 1);
    //         }
    //         else{
    //             return array('type' => 'mins', 'time' => $minutes);
    //         }
    //     }
    //     elseif($hours <= 24)
    //     {
    //         if($hours == 1)
    //         {
    //             return array('type' => 'hours', 'time' => 1);
    //         }
    //         else
    //         {
    //             return array('type' => 'mins', 'time' => $hours);
    //         }
    //     }
    //     else
    //     {
    //        return false;
    //     }
    // }
    
}

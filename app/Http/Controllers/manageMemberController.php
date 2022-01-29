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
        $posts = User::where('is_posted', 1)->get();

        // return $posts;

        // return $users;
        // return $posted_by->user->name;
       // $members = User::get();
        //$users =  User::with(['userdetail', 'postings'])->orderBy("id", 'DESC')->get(); 
        //$users = User::with('userdetail')->orderBy("id","DESC")->get(); 
        // $user = User::find(3)->userdetail;

        return view('admin.manageMember', compact('users', 'posts'));
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

        $start_date = strtotime($request->start_date);
        // return $start_date;
        $end_date = strtotime($request->end_date);
        $post_duration = abs($end_date - $start_date);
        // $year = floor($post_duration/(365*60*60*24));
        // $month = floor(($post_duration-$year*365*60*60*24)/(365*60*60*24));
    //     $dataing = date("t", strtotime($post_duration
    // ));
       return $post_duration;

        $start_date = new DateTime($request->start_date);
        $end_date = new DateTime($request->end_date);
        $duration = $end_date->diff($start_date);        
        return $duration;
        //    return $duration->format('%m months, %d days');

        $start_date = strtotime($request->start_date);
        $end_date = strtotime($request->end_date);
        $check_duration = ($end_date - $start_date);
        // return $check_duration; date(y-m-d);

    

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
        $post->check_duration = $check_duration;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;

        // return $post;

        if($post->save())
        {
            //This function will help to update the postcount field in User table each time posted
            //Meaning when posting is carried out, the field increment by one

            
            $user = User::find($post->member_id);
            //This line of code help to increment post_count field each time a user is posted
            // $user->post_count = $user->post_count + 1;            
            $user->post_count += 1;            
            $user->is_posted = 0;
            $user->save(); 
            // return $user;

            // return $post->with('details')->get();
            $redirect = 'admin/posted-members';
            return redirect($redirect)->with('message', 'Posting Done!');
        }        
    }    
   
    public function posted_member()
    {
        $members_posted = Posting::with('user', 'subunit')->orderBy('id', 'DESC')->get();
        // return $members_posted;
        // return $members_posted->user->userdetail;->where('is_posted', 1)
        return view('admin.posting', compact('members_posted'));
    }

    
    
}

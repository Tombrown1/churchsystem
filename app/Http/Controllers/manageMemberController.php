<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Posting;
use App\Models\TrackPosting;
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
        $posts = User::where('is_posted', 0)->where('role', '!=', 1)->get();

        // return $posts;

        // return $users;
        // return $posted_by->user->name;
       // $members = User::get();
        //$users =  User::with(['userdetail', 'postings'])->orderBy("id", 'DESC')->get(); 
        //$users = User::with('userdetail')->orderBy("id","DESC")->get(); 
        // $user = User::find(3)->userdetail;

        return view('admin.manageMember',compact('users', 'posts'));
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

        
        $s_date = date('Y-m-d', strtotime($request->start_date));
        $e_date = date('Y-m-d', strtotime($request->end_date));
        // return $end_date;
    //    return $e_date;
        
        $start_date = new DateTime($request->start_date);
        $end_date = new DateTime($request->end_date);
        $duration = $end_date->diff($start_date); 

        // return $duration->format('%m months, %d days');

        // return $duration->format('%m months, %d days');
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
        $post->start_date = $s_date;
        $post->end_date = $e_date;

        // return  $currentDate = date('Y-m-d', strtotime('now'));

        if($post->save())
        {
            //This function will help to update the postcount field in User table each time a user is posted
            //Meaning when posting is carried out, the field increment by one

            
            $user = User::find($post->member_id);
            //This line of code help to increment post_count field each time a user is posted
            // $user->post_count = $user->post_count + 1;            
            $user->post_count += 1;            
            $user->is_posted = 1;
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

    public function expired_posting()
    {
        $exp_posted_member = TrackPosting::with('user', 'subunit')->orderBy('id', 'DESC')->paginate(20);
        // return $exp_posted_member;
        return view('admin.expired_posting', compact('exp_posted_member'));
    }

    public function terminate(Request $request, $id)
    {
        $this->validate($request, [
            'member_id' => 'required',
            'member_name' => 'required',
            'subunit_id' => 'required',
            'is_terminated' => 'required',
            'reason' => 'required',
            'date_terminated' => 'required',
        ]);

        //Is_terminate value meaning
        //Repost = 1
        //Transfer = 2
        //Suspend = 3
        //Terminate = 4
        
        // return $request;
        //This function is to fetch the posting table record and assign it to the
        //intantiation variables in the Tracking Posting table
        $terminate_post = Posting::where('member_id', '=', $id)->get();
        // $terminate_post = Posting::find($id);
        foreach($terminate_post as $terminate){
            // This function is to insert the request field from termination form 
            //and insert it to the track posting table
            $terminate_tp = new TrackPosting;

            $terminate_tp->posting_status = $terminate->posting_status;
            $terminate_tp->duration = $terminate->duration;
            $terminate_tp->user_id = $terminate->user_id;
            $terminate_tp->start_date = $terminate->start_date;
            $terminate_tp->expired_at = $terminate->end_date;
            $terminate_tp->member_id = $request->member_id;
            $terminate_tp->subunit_id = $request->subunit_id;
            $terminate_tp->reason = $request->reason;
            $terminate_tp->is_terminated = $request->is_terminated;
            $terminate_tp->date_terminated = $request->date_terminated;
        }
       
        // return $terminate_tp;

        $terminate_tp->save();

        $user = User::find($terminate->member_id);
        $user->is_posted = 0;
        $user->suspension_id = $request->is_terminate;
        $user->update();
        
        $del_posting = Posting::find($terminate->id);

        $del_posting->delete();

        return back()->with('message', 'Member successfully suspended!');
    }


    
    
}

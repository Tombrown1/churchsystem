<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Posting;
use Carbon\Carbon;
use Auth;

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
        $start_date = strtotime($request->start_date);
        $end_date = strtotime($request->end_date);
        $date_diff = ($start_date - $end_date);
         
        $duration =  date('Y-m-d', $date_diff);

        // return $duration;

        
                
        $posted_by = Auth::user()->id;
        $post = new Posting;

        $post->user_id = $posted_by;
        $post->member_id = $request->member_id;
        $post->subunit_id = $request->subunit_id;
        $post->posting_status = $request->posting_status;
        $post->duration = $duration;
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
    
}

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
        $posted_by = Posting::where('user_id', 1)->first();

        // return $posted_by->user->name;
       // $members = User::get();
        // $users = User::with('userdetail')->orderBy("id", 'DESC')->get(); 
        $users = User::orderBy("id","DESC")->get(); 
        // return $users;

        return view('admin.manageMember', compact('users', 'posted_by'));
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

        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $duration = $end_date->diffForHumans($start_date);
        
        // return  $duration;

        if($request->posting_status == 'Probation'){
            $posting_status = 1;
        }else{
            $posting_status = 2;
        }
        
       
        $posted_by = Auth::user()->id;
        $post = new Posting;

        $post->user_id = $posted_by;
        $post->member_id = $request->member_id;
        $post->subunit_id = $request->subunit_id;
        $post->posting_status = $posting_status;
        $post->duration = $duration;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;

        // return $post;

        if($post->save())
        {
            return redirect('admin.posting')->with('message', 'Posting Done!');
        }        
    }    
   
    public function posted_member()
    {
        $members_posted = Posting::get();
        // return $members_posted->user->userdetail;
        return view('admin.posting', compact('members_posted'));
    }
    
}

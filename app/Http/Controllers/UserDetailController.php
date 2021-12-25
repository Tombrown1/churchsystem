<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Storage;
use Auth;

class UserDetailController extends Controller
{
    public function personaldetail(Request $request)
    {
        $this->validate($request, [
            'user_id' => ['required'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email' => ['required'],
            'work_phone' => ['required'],
            'home_phone' => ['required'],
            'dob' => ['required'],
            'pob' => ['required'],
            // 'image' => ['required|image|mimes:png,jpeg,jpg,gif,pdf|max:2048'],  
            'marital_status' => ['required'],   
        ]);

        if($request->hasfile('passport'))
        {
            request()->validate([
                'passport' => 'required',
                'passport' => 'mimes:gif,jpg,jpeg,png,pdf,|max:2048'
            ]);
            $file = $request->file('passport');
            $path = Storage::disk('public')->putFile('images', $file);
        }

        $created_by = Auth::user()->id;

        // return $request;
        
        $userdetail = new UserDetail;

        $userdetail->user_id = $request->user_id;
        $userdetail->created_by = $created_by;
        $userdetail->firstname = $request->firstname;
        $userdetail->lastname = $request->lastname;
        $userdetail->gender = $request->gender;
        $userdetail->email = $request->email;
        $userdetail->work_phone = $request->work_phone;
        $userdetail->home_phone = $request->home_phone;
        $userdetail->dob = $request->dob;
        $userdetail->pob = $request->pob;
        $userdetail->passport = $file;
        $userdetail->marital_status = $request->marital_status;

        // return $userdetail;
        if($userdetail->save())
        {
            return back()->with('message', 'User Personal Details is added, please proceed and update Next of Kin Record');
        }
    }

        


    public function nextofkin(Request $request)
    {
        $this->validate($request,[
            'fname_next_of_kin' => ['required'],
            'lname_next_of_kin' => ['required'],
            'phone_next_of_kin' => ['required'],
            'relate_next_of_kin' => ['required'],
            'gender_next_of_kin' => ['required'],
            'address_next_of_kin' => ['required'],
            'gender_next_of_kin' => ['required'],
        ]);
    }

    public function workprofession(Request $request)
        {
            $this->validate($request, [
            'employment_status' => ['required'],
            'profession' => ['required'],
            'area_of_specialization' => ['required'],
            'nationality' => ['required'],
            'state_origin' => ['required'],
            'lga' => ['required'],
            'town' => ['required'],
            'maiden_name' => ['required'],
            'resident_address' => ['required'],
            'category' => ['required'],
            ]);
        }

    public function churchmember(Request $request)
        {
            $this->validate($request, [
            'born_again' => ['required'],
            'church_join_date' => ['required'],
            'unit_join_date' => ['required'],
            'membership_class' => ['required'],
            'water_baptism' => ['required'],
            'holyghost_baptism' => ['required'],
            'wofbi_id' => ['required'],
            'tither' => ['required'],
            'homecell_id' => ['required'],
            'hobbies' => ['required'],
            'hobbies' => ['required'],
            'hobbies' => ['required'],
            ]);
        }

    public function userProfile($id)
    {   
        $user = User::find($id);        
        return view('admin.profile', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserDetailController extends Controller
{
    public function AddUserDetails(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'work_phone' => ['required'],
            'home_phone' => ['required'],
            'dob' => ['required'],
            'pob' => ['required'],
            'passport' => ['required'],
            'marital_status' => ['required'],
            'fname_next_of_kin' => ['required'],
            'lname_next_of_kin' => ['required'],
            'phone_next_of_kin' => ['required'],
            'relate_next_of_kin' => ['required'],
            'gender_next_of_kin' => ['required'],
            'address_next_of_kin' => ['required'],
            'gender_next_of_kin' => ['required'],
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

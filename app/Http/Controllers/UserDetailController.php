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
            $passport = $request->file('passport');            
            $passport_name = $passport->getClientOriginalName();
            $path = Storage::disk('public')->putFile('images', $passport_name);
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
        $userdetail->passport = $passport_name;
        $userdetail->marital_status = $request->marital_status;

        // return $userdetail;
        if($userdetail->save())
        {
            session(['last_id' => $userdetail->id]);
            return back()->with('message', 'User Personal Details is added, please proceed and update Next of Kin Record');
        }
    }

        


    public function nextofkin(Request $request, $id)
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

       

        // $userdetail_id = session()->get('last_id');
        $nextofkin = Userdetail::find($id);
        // return $nextofkin->id;

        $nextofkin->fname_next_of_kin = $request->fname_next_of_kin;
        $nextofkin->lname_next_of_kin = $request->lname_next_of_kin;
        $nextofkin->phone_next_of_kin = $request->phone_next_of_kin;
        $nextofkin->relate_next_of_kin = $request->relate_next_of_kin;
        $nextofkin->gender_next_of_kin = $request->gender_next_of_kin;
        $nextofkin->address_next_of_kin = $request->address_next_of_kin;
        $nextofkin->gender_next_of_kin = $request->gender_next_of_kin;
        
        if($nextofkin->save())
        {
            return back()->with('message', 'Next of Kin Record saved, please proceed with other form so as to keep your record updated');
        }
    }

    public function workprofession(Request $request, $id)
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
            // 'category' => ['required'],
            ]);

            // $workpro_id = session()->get('last_id');
            $workpro = UserDetail::find($id);

            $workpro->employment_status = $request->employment_status;
            $workpro->profession = $request->profession;
            $workpro->area_of_specialization = $request->area_of_specialization;
            $workpro->nationality = $request->nationality;
            $workpro->state_origin = $request->state_origin;
            $workpro->lga = $request->lga;
            $workpro->town = $request->town;
            $workpro->maiden_name = $request->maiden_name;
            $workpro->resident_address = $request->resident_address;


            if($workpro->save())
        {
            return back()->with('message', 'Work Profession Record saved, please proceed with other form so as to keep your record updated');
        }

        }   

        
    public function churchmember(Request $request, $id)
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
            ]);

            // $church_id = session()->get('last_id');
            $churchmember = UserDetail::find($id);

            // return $churchmember;

            $churchmember->born_again = $request->born_again;
            $churchmember->church_join_date = $request->church_join_date;
            $churchmember->unit_join_date = $request->unit_join_date;
            $churchmember->membership_class = $request->membership_class;
            $churchmember->water_baptism = $request->water_baptism;
            $churchmember->holyghost_baptism = $request->holyghost_baptism;
            $churchmember->wofbi_id = $request->wofbi_id;
            $churchmember->tither = $request->tither;
            $churchmember->homecell_id = $request->homecell_id;
            $churchmember->hobbies = $request->hobbies;


            if($churchmember->save())
            {
                return back()->with('message', 'Member record is fully updated, Congratulation!');
            }
        }

    public function userProfile($id)
    {   
        $user = User::find($id);        
        return view('admin.profile', compact('user'));
    }
}

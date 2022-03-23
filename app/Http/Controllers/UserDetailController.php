<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use JD\Cloudder\Facades\Cloudder;
use Storage;
use Auth;

class UserDetailController extends Controller
{
    public function personaldetail(Request $request, $id)
    {
        $this->validate($request, [
            // 'user_id' => ['required'],
            'surname' => ['required', 'string', 'max:255'],
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
        if($request->hasFile('passport'))
        {
            $request->validate([
                'passport' => 'required',
                'passport' => 'mimes:jpeg,jpg,png,gif,pdf|max:2048'
            ]);

            if(env('APP_ENV') == 'local'){
                $passport = $request->file('passport');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($passport->getClientOriginalExtension());
                $img_name = $name_gen.'.'.$img_ext;
                $up_location = 'images/passport/';
                $last_img = $up_location.$img_name;

            }else{
                $image_name = $file->getRealPath();
                Cloudder::upload($image_name, null);
                
                list($width, $height) = getimagesize($image_name);
    
                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                
                $last_img = $image_url;
            }
        }

        // return $request;
        
        $passport = $request->file('passport');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($passport->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'images/passport/';
        $last_img = $up_location.$img_name;
        $passport->move($up_location,$img_name);

        $created_by = Auth::user()->id;

        // return $request->hasfile('passport');
        
        $userdetail = UserDetail::find($id);
        // $userdetail = new UserDetail;

        // return $userdetail;

        // $userdetail->user_id = $request->user_id;
        $userdetail->created_by = $created_by;
        $userdetail->surname = $request->surname;
        $userdetail->firstname = $request->firstname;
        $userdetail->lastname = $request->lastname;
        $userdetail->gender = $request->gender;
        $userdetail->email = $request->email;
        $userdetail->work_phone = $request->work_phone;
        $userdetail->home_phone = $request->home_phone;
        $userdetail->dob = $request->dob;
        $userdetail->pob = $request->pob;
        $userdetail->marital_status = $request->marital_status;
        $userdetail->passport = $last_img;


        // if($request->hasfile('passport'))
        // {
        //     request()->validate([
        //         'passport' => 'required',
        //         'passport' => 'mimes:gif,jpg,jpeg,png,pdf,|max:2048'
        //     ]);
        //     $file = $request->file('passport'); 
        //     // $passName = $passport->getClientOriginalName();
        //     $path = Storage::disk('public')->putFile('images', $file);

        //     $userdetail->passport = $path;        
        // }

        // return $userdetail;

        if($userdetail->save())
        {
            //This Logic will have to update user table status with 1 once this field is been saved in user details table for easy identification
            $update_status = User::find($userdetail->user_id);
            $update_status->status = 1;
            $update_status->save();

            session(['last_id' => $userdetail->id]);
            return back()->with('message', 'User Personal Details is added, please proceed and update Next of Kin Record');
        }
    }


    public function edit_user_personal_detail($id)
    {
        $user = User::find($id);

        return view('admin.edit_userdetail', compact('user'));
    }

    public function update_personal_detail(Request $request, $id)
    {   
        $this->validate($request, [
            'surname' => ['required', 'min:5'],
            'firstname' => ['required', 'min:5'],
            'lastname' => ['required', 'min:5'],
            'gender' => ['required'],
            'email' => ['required'],
            'work_phone' => ['required'],
            'home_phone' => ['required'],
            'dob' => ['required'],
            'pob' => ['required'],
            'marital_status' => ['required'] 
        ]);

        // if($request->hasfile('passport'))
        // {
        //     request()->validate([
        //         'passport' => 'required',
        //         'passport' => 'mimes:gif,jpg,jpeg,png,pdf,|max:2048'
        //     ]);

        //     $passport = $request->file('passport'); 
        //     // $passName = $passport->getClientOriginalName();
        //     $path = Storage::disk('public')->putFile('images', $passport);                 
        // }

        //Instantiate Database personal_detail table
        $personal_detail = UserDetail::find($id);

        if($request->hasFile('passport'))
        {
            $request->validate([
                'passport' => 'mimes:jpeg,jpg,png,gif,pdf|max:2048' 
            ]);
            $file = $request->file('passport');
            $last_img = null;

            if(env('APP_ENV') == 'local')
            {                
                if(!empty($personal_detail->passport)){
                    if(file_exists($personal_detail->passport)){
                        unlink($personal_detail->passport);
                        $personal_detail->passport = null;
                        $personal_detail->update();
                    }else{
                        $personal_detail->passport = null;
                        $personal_detail->update();
                    }
                }
                // Create a new passport file
                $passport = $file;
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($passport->getClientOriginalExtension());
                $img_name = $name_gen.'.'.$img_ext;
                $up_location = 'images/passport/';
                $last_img = $up_location.$img_name;
                $passport->move($up_location,$img_name);

            }elseif(env('APP_ENV') == 'production')
            {
                $image_name = $file->getRealPath();
                Cloudder::upload($image_name, null);
                
                list($width, $height) = getimagesize($image_name);
    
                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                
                $last_img = $image_url;
            }

        }else{

            $last_img = $personal_detail->passport;
        }

        // $passport = $request->file('passport');
        // if($passport){
        //     $name_gen = hexdec(uniqid());
        //     $img_ext = strtolower($passport->getClientOriginalExtension());
        //     $img_name = $name_gen.'.'.$img_ext;
        //     $up_location = 'images/passport/';
        //     $last_img = $up_location.$img_name;
        //     $passport->move($up_location,$img_name);

        //     $created_by = Auth::user()->id;
            
        //         // if($old_passport == true){
        //         //     unlink($old_passport);
        //         // }

            

        //     $personal_detail->user_id = $request->user_id;
        //     $personal_detail->created_by = $created_by;
        //     $personal_detail->surname = $request->surname;
        //     $personal_detail->firstname = $request->firstname;
        //     $personal_detail->lastname = $request->lastname;
        //     $personal_detail->gender = $request->gender;
        //     $personal_detail->email = $request->email;
        //     $personal_detail->work_phone = $request->work_phone;
        //     $personal_detail->home_phone = $request->home_phone;
        //     $personal_detail->dob = $request->dob;
        //     $personal_detail->pob = $request->pob;
        //     $personal_detail->marital_status = $request->marital_status;
        //     $personal_detail->passport = $last_img;

        //     if($personal_detail->update())
        //     {
        //         //This logic here helps to update user table with user name during 
        //         //editing in userdetails table
        //         $update_user = User::find($personal_detail->user_id);
        //         $update_user->name = $request->surname.' '.$request->firstname.' '.$request->lastname;         
        //         $update_user->gender = $request->gender;
        //         $update_user->email = $request->email;

        //             $update_user->update();
        //         return back()->with('message', 'Personal Details Updated Successfully, kindly proceed in updating Next of Kin Record, if need be!');
        //     }
        // }else{

        //     $created_by = Auth::user()->id;

        //     $personal_detail = UserDetail::find($id);

        //     $personal_detail->user_id = $request->user_id;
        //     $personal_detail->created_by = $created_by;
        //     $personal_detail->firstname = $request->firstname;
        //     $personal_detail->lastname = $request->lastname;
        //     $personal_detail->gender = $request->gender;
        //     $personal_detail->email = $request->email;
        //     $personal_detail->work_phone = $request->work_phone;
        //     $personal_detail->home_phone = $request->home_phone;
        //     $personal_detail->dob = $request->dob;
        //     $personal_detail->pob = $request->pob;
        //     $personal_detail->marital_status = $request->marital_status;

        //     if($personal_detail->update())
        //     {
        //         return back()->with('message', 'Personal Details Updated Successfully, kindly proceed in updating Next of Kin Record, if need be!');
        //     } 
        // }
        
        $created_by = Auth::user()->id;

        $personal_detail->user_id = $request->user_id;
        $personal_detail->created_by = $created_by;
        $personal_detail->firstname = $request->firstname;
        $personal_detail->lastname = $request->lastname;
        $personal_detail->gender = $request->gender;
        $personal_detail->email = $request->email;
        $personal_detail->work_phone = $request->work_phone;
        $personal_detail->home_phone = $request->home_phone;
        $personal_detail->dob = $request->dob;
        $personal_detail->pob = $request->pob;
        $personal_detail->marital_status = $request->marital_status;
        $personal_detail->passport = $last_img;

        // return $personal_detail;

        if($personal_detail->update())
        {
                // This logic here helps to update user table with user name during 
                //editing in userdetails table
                $update_user = User::find($personal_detail->user_id);
                $name = explode(" ", trim($request->firstname));
                $username = $name[0].rand(4,10000);
                $password = $username;

                $update_user->name = $request->surname.' '.$request->firstname.' '.$request->lastname;
                $update_user->gender = $request->gender;
                $update_user->email = $request->email;
                $update_user->username = $username;
                $update_user->password = $password;
                // return $update_user;

                $update_user->update();

            return back()->with('message', 'Personal Details Updated Successfully, kindly proceed in updating Next of Kin Record, if need be!');
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
        // return $request;

        $nextofkin->fname_next_of_kin = $request->fname_next_of_kin;
        $nextofkin->lname_next_of_kin = $request->lname_next_of_kin;
        $nextofkin->phone_next_of_kin = $request->phone_next_of_kin;
        $nextofkin->relate_next_of_kin = $request->relate_next_of_kin;
        $nextofkin->gender_next_of_kin = $request->gender_next_of_kin;
        $nextofkin->address_next_of_kin = $request->address_next_of_kin;
        $nextofkin->gender_next_of_kin = $request->gender_next_of_kin;
        
        if($nextofkin->save())
        {
            //This logic will update user table status 2 once the above form record is save.
            $update_status = User::find($nextofkin->user_id);
            $update_status->status = 2;
            $update_status->save();
          
            return back()->with('message', 'Next of Kin Record saved, please proceed with other form so as to keep your record updated');
        }
    }

    public function update_nextofkin(Request $request, $id)
    {
        $updateNextofkin = UserDetail::find($id);

        $updateNextofkin->fname_next_of_kin = $request->fname_next_of_kin;
        $updateNextofkin->lname_next_of_kin = $request->lname_next_of_kin;
        $updateNextofkin->phone_next_of_kin = $request->phone_next_of_kin;
        $updateNextofkin->relate_next_of_kin = $request->relate_next_of_kin;
        $updateNextofkin->gender_next_of_kin = $request->gender_next_of_kin;
        $updateNextofkin->address_next_of_kin = $request->address_next_of_kin;
        $updateNextofkin->gender_next_of_kin = $request->gender_next_of_kin;

        if($updateNextofkin->update())
        {
            return back()->with('message', 'Next of Kin Record Updated Successfully, please proceed with other update if need be !');
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
             //This logic will update user table status with 3 once the above form record is save.
             $update_status = User::find($workpro->user_id);
             $update_status->status = 3;
             $update_status->save();

            return back()->with('message', 'Work Profession Record saved, please proceed with other form so as to keep your record updated');
        }

        }
        
        public function updateworkpro(Request $request, $id)
        {
            $update_workpro = UserDetail::find($id);

            $update_workpro->employment_status = $request->employment_status;
            $update_workpro->profession = $request->profession;
            $update_workpro->area_of_specialization = $request->area_of_specialization;
            $update_workpro->nationality = $request->nationality;
            $update_workpro->state_origin = $request->state_origin;
            $update_workpro->lga = $request->lga;
            $update_workpro->town = $request->town;
            $update_workpro->maiden_name = $request->maiden_name;
            $update_workpro->resident_address = $request->resident_address;

            if($update_workpro->update())
            {
                return back()->with('message', 'Work Profession Update saved, please proceed with other record updates if need be!');
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
                 //This logic will update user table status with 4 once the above form record is save.
                $update_status = User::find($churchmember->user_id);
                $update_status->status = 4;
                $update_status->save();

                return back()->with('message', 'Member record is fully updated, Congratulation!');
            }
        }

        public function updatechurchmember(Request $request, $id)
        {
            $updatechurch = UserDetail::find($id);

            $updatechurch->born_again = $request->born_again;
            $updatechurch->church_join_date = $request->church_join_date;
            $updatechurch->unit_join_date = $request->unit_join_date;
            $updatechurch->membership_class = $request->membership_class;
            $updatechurch->water_baptism = $request->water_baptism;
            $updatechurch->holyghost_baptism = $request->holyghost_baptism;
            $updatechurch->wofbi_id = $request->wofbi_id;
            $updatechurch->tither = $request->tither;
            $updatechurch->homecell_id = $request->homecell_id;
            $updatechurch->hobbies = $request->hobbies;

            if( $updatechurch->update())
            {
                return back()->with('message', 'Congratulation! Update Completed');
            }

        }

    public function userProfile($id)
    {   
        $user = User::find($id);        
        return view('admin.profile', compact('user'));
    }

    public function post_count($id){
        // $user = User::find($id);
        $user = UserDetail::with(['posting', 'user'])->find($id);
        // return $user;

        return view('admin.post_count', compact('user'));
    }
}

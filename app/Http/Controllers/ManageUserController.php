<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Posting;

class ManageUserController extends Controller
{
    public function ManageUser()
    {   
        $users = UserDetail::with('user', 'posting')->orderBy('user_id', 'DESC')->get();  
        // $users = User::get();  
        // return $users;      
        return view('admin.manage_user', compact('users'));
    }
  

    public function createUser(Request $request)
    {    
        //   
       $this->validate($request, [
        'surname' => ['required', 'string', 'max:255'],
        'fname' => ['required', 'string', 'max:255'],
        'lname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // 'password' => ['required', 'min:8'],
        // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'gender' => ['required'],
       ]);

        // return $request;
        
       //  dd($request);
        $fullname = $request->surname. ' ' .$request->fname. ' '. $request->lname;
        $name = explode(" ", trim($request->fname));
        $username = $name[0].rand(4,10000);
        $password = $username;
        // return $username;
        // $password = Hash::make('yourPa$$w0rd');

        // Role Definitions : 1 = root_admin, 2 = super_admin, 3 = admin, 4 = user
        // Badge Definitions : 4 = Probation, 3 = Full Member, 2 = Leadership
        if($request->role == 2){
            $role = 2;
        }elseif($request->role == 3){
            $role = 3;
        }else{
            $role = 4;
        }

      
            
        // return $role;
        // $created_by = Auth::user()->id;
        
        $user = new User;

        $user->username = $username;
        $user->name = $fullname;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = Hash::make($password);
        $user->role = $role;

        // return $user;

        if($user->save())
        {
            $userdetail = new UserDetail;
            $userdetail->user_id = $user->id;
            $userdetail->created_by = Auth::user()->id;
            $userdetail->surname = $request->surname;
            $userdetail->firstname = $request->fname;
            $userdetail->lastname = $request->lname;
            $userdetail->gender = $user->gender;
            $userdetail->email = $user->email;

            $userdetail->save();

            $redirect = 'admin/profile/'. $userdetail->user_id;
            return redirect($redirect)->with('message', 'User is Created Successfully!, complete the user registration');
        }

        
    }

    public function deluser($id)
    {
        $user = User::destroy($id);
        return back()->with('message', 'User Deleted Successfully!');
    }

}

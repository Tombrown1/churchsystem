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
        $users = UserDetail::with('user', 'posting')->orderBy('id', 'DESC')->get();  
        // $users = User::get();  
        // return $users;      
        return view('admin.manage_user', compact('users'));
    }
  

    public function createUser(Request $request)
    {    
        //   
       $this->validate($request, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // 'password' => ['required', 'min:8'],
        // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'gender' => ['required'],
       ]);

        // return $request;
        
       //  dd($request);
        // $password = $request->name.rand(4, 50);
        $name = explode(" ", trim($request->name));
        // return $name[0];
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
        
        $user = new User;

        $user->username = $username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = Hash::make($password);
        $user->role = $role;
        $user->banned_id = 0;
        $user->suspension_id = 0;
        $user->badge = $role;

        // return $user;

        if($user->save())
        {
            $redirect = 'admin/profile/'. $user->id;
            return redirect($redirect)->with('message', 'User is Created Successfully!, complete the user registration');
        }

        
    }

    public function deluser($id)
    {
        $user = User::destroy($id);
        return back()->with('message', 'User Deleted Successfully!');
    }

}

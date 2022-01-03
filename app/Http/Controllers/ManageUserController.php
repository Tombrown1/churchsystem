<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;


use App\Models\User;

class ManageUserController extends Controller
{
    public function ManageUser()
    {   
        $users = User::all();        
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
        $password = $request->name;
        $username = $request->name.rand(2,100);
        // $password = Hash::make('yourPa$$w0rd');
        // Role Definitions : 1 = root_admin, 2 = super_admin, 3 = admin, 4 = user
       

        $user = new User;

        $user->username = $username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = Hash::make($password);
        $user->role = 0;
        $user->banned_id = 0;
        $user->suspension_id = 0;
        $user->badge = 4;

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

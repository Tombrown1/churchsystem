<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'surname' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['required'],
            
        ]);

        // return $request;
       
        $fullname = $request->surname.' '. $request->fname.' '. $request->lanme;
        $username = $request->name[0].rand(4,10000);
        return $username;
        $user = User::create([
            'username' => $username,
            'name' => $fullname,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'role' => 0,
            
        ]);

        // $userdetail = new UserDetail;
        // $userdetail = new UserDetail;

        // return $user;

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        // return redirect(RouteServiceProvider::USER);
    }
}

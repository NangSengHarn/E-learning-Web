<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
   public function create()
   {
    return view('auth.register');
   }
   public function store()
   {
    //validation
    $formData=request()->validate([
        'name'=>'required',
        'username'=>['required',Rule::unique('users','username')],
        'email'=>['required','email',Rule::unique('users','email')],
        'password'=>'required|min:6',
    ]);
    $user=User::create($formData);
    //login
    auth()->login($user);

    return redirect('/')->with('success','Welcome Dear, '.$user->name);
   }

   public function logout()
   {
    auth()->logout();
    return redirect('/')->with('success','Good bye');
   }
   public function login()
   {
    return view('auth.login');
   }
   public function post_login()
   {
    //validation
    $formData=request()->validate([
        'email'=>['required','email',Rule::exists('users','email')],
        'password'=>'required|min:6',
    ]);
    //auth attempt
    if(auth()->attempt($formData)){
        //if user credentials correct -> redirect home
        if(auth()->user()->usertype=="student"){
            return redirect('/')->with('success','Welcome back');
        }else{
            return redirect('/admin/blogs');
        }
    }else{
        //if user credentials fail -> redirect back to form with error
        return redirect()->back()->withErrors([
            'email'=>'Wrong Password'
        ]);
    };
   }
}

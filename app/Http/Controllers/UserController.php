<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Session;

class UserController extends Controller
{
    //
    public function login(LoginRequest $request) 
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $error = __('trans.Email_or_Pasword_not_matched');
               
                return view('login', ['error' => $error]);
        } else {
            
            return redirect('home');
        }  
    }
    //
    public function logout()
    {
        Auth::logout();

        return redirect()->route('loginpage');
    }
}

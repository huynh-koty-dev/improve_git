<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function getLoginView()
    {
        if (Auth::user()) {
            return \redirect()->route('todos.index');
        }

        return view('login');
    }

    public function getRegisterView()
    {
        if (Auth::user()) {
            return \redirect()->route('todos.index');
        }

        return view('register');
    }
    
    public function login(LoginRequest $request) 
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return \redirect()->route('todos.index');
        }
        $error = __('trans.Email_or_Pasword_not_matched');
               
        return view('login', ['error' => $error]);
    }
    //
    public function logout()
    {
        Auth::logout();

        return redirect()->route('loginpage');
    }

    public function register(RegisterRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        if ($user) {

            return \redirect()->route('loginpage')->with('success', __('trans.register_success'));
        } else {

            return back()->with('fail', __('trans.register_fail'));
        }
    }
}

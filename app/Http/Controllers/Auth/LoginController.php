<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_page(){
        return view('auth.login');
    }
    public function login(Request $request){
        if (auth()->attempt(['email' => $request->email,'password' => $request->password,'type' =>'0'])) {
            return redirect()->route('index');
        }
        elseif (auth()->attempt(['email' => $request->email,'password' => $request->password,'type' =>'1'])) {
            return redirect()->route('index');
        }
        else{
            return redirect()->route('login.page')->with('error','email or password error');

        }
    }}

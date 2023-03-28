<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register_page(){
        return view('auth.register');
    }
    public function register( Request $request){
      $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required|confirmed|min:5|max:25',]);
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        auth()->loginUsingId($data->id);
        return redirect('/');    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.page');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.user', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.user.add',compact('users'));
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view("admin.user.edit", compact('users'));
    }
    public function store(Request $request)
    {
        $users =new User();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
            'image' =>'required|image|mimes:jpeg,png,jpg,gif',
            'type'=>'required',
            'phone'=>['required', 'string', 'min:10'],
        ]);

        if($request->file('image')) {
            $file = $request->file('image');
            $image = date('image') . $file->getClientOriginalName();
            $file->move(public_path('admin/img/user'), $image);
            $users['image'] = $image;
        }
        $users->name=$request->name;
        $users->password=bcrypt($request->password);
        $users->email=$request->email;
        $users->phone=$request->phone;
        $users->type=$request->type;
        $users->save();
        return redirect()->route('user')->with('success', 'user added successfully.');
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [ 'string', 'email', 'max:255', 'unique:'.User::class],
            'image' =>'image|mimes:jpeg,png,jpg,gif',
            'type'=>'required',
            'phone'=>['required', 'string', 'min:10'],
            'user_id'=>'required'

        ]);

        $users = User::findOrFail($id);
        if($request->file('image')) {
            $file = $request->file('image');
            $image = date('image') . $file->getClientOriginalName();
            $file->move(public_path('admin/img/user'), $image);
            $users->image = $image;
        }

        $users->name=$request->name;
        $users->phone=$request->phone;
        $users->type=$request->type;
        $users->update();
        return redirect()->route('user')->with('success', 'user updated successfully.');
    }

    public function delete($id)
    {

        $users = User::findOrFail($id);
        if ($users->image) {
            Storage::delete($users->image);
        }
        $users->delete();
        return redirect()->route('user')->with('success', 'data deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChefsController extends Controller
{
    public function index()
    {
        $chefs = Chef::all();
        return view('admin.chef.chefs', compact('chefs'));
    }
    public function store(Request $request)
    {
        $chefs =new Chef();
        $request->validate([
            'title'=>'required|string|max:100',
            'name'=>'required|string|max:100',
            'desc'=>'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required',

        ]);
        if($request->file('image')) {
            $file = $request->file('image');
            $image = date('image') . $file->getClientOriginalName();
            $file->move(public_path('admin/img/chef'), $image);
            $chefs['image'] = $image;
        }
        $chefs->title=$request->title;
        $chefs->name=$request->name;
        $chefs->desc=$request->desc;
        $chefs->user_id=Auth::user()->id;
        $chefs->save();
        return redirect()->route('chef')->with('success', 'Chef added successfully.');

    }
    public function edit($id){
        $chefs = Chef::findOrFail($id);
        return view('admin.chef.edit',compact('chefs'));
    }
    public function update(Request $request, $id){
        $chefs = Chef::findOrFail($id);

        $request->validate([
            'title'=>'required|string|max:100',
            'name'=>'required|string|max:100',
            'desc'=>'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $path = 'admin/img/chef/' . $chefs->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('admin/img/chef/'), $filename);
            $chefs->image = $filename;
        }
        $chefs->title=$request->title;
        $chefs->name=$request->name;
        $chefs->desc=$request->desc;
        $chefs->user_id=$request->user_id;
        $chefs->update();
        return redirect()->route('chef')->with('success', 'chef Page updated successfully.');


    }
    public function delete($id)
    {
        $chefs = Chef::findOrFail($id);
        Storage::delete($chefs->image);
        $chefs->delete();
        return redirect(route("chef"))->with('success', 'data deleted successfully');
    }
}

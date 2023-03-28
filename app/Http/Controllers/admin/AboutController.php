<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.about', compact('abouts'));
    }

    public function update(Request $request)
    {
        $abouts = About::findOrFail(1);
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg,gif',
            'background_image' => 'image|mimes:jpg,png,jpeg,gif',
            'video' => 'string',
            'contact' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
        ]);

        if ($request->hasFile('image')) {
            $path = 'admin/img/about/' . $abouts->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('admin/img/about/'), $filename);
            $abouts->image = $filename;
        }
        if ($request->hasFile('background_image')) {
            $path = 'admin/img/about/' . $abouts->background_image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('background_image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('admin/img/about/'), $filename);
            $abouts->background_image = $filename;
        }
        $abouts->title=$request->title;
        $abouts->description=$request->description;
        $abouts->video=$request->video;
        $abouts->contact=$request->contact;
        $abouts->user_id=$request->user_id;
        $abouts->phone=$request->phone;
        $abouts->update();
        return redirect()->route('about')->with('success', 'About Page updated successfully.');


    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoverController extends Controller
{
    public function index()
    {
        $covers = Cover::all();
        return view('admin.cover', compact('covers'));
    }

    public function update(Request $request)
    {
        $covers = Cover::findOrFail(1);
       $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg,gif',
            'video' => 'string',
        ]);

        if ($request->hasFile('image')) {
            $path = 'admin/img/cover/' . $covers->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('admin/img/cover/'), $filename);
            $covers->image = $filename;
        }
        $covers->title=$request->title;
        $covers->description=$request->description;
        $covers->video=$request->video;
        $covers->user_id=$request->user_id;
        $covers->update();
        return redirect()->route('cover')->with('success', 'Cover updated successfully.');


    }

}

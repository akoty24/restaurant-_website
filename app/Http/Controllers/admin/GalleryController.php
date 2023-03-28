<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.gallery', compact('galleries'));
    }
    public function store(Request $request)
    {
        $galleries =new Gallery();
        $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required',

        ]);
        if($request->file('image')) {
            $file = $request->file('image');
            $image = date('image') . $file->getClientOriginalName();
            $file->move(public_path('admin/img/gallery'), $image);
            $galleries['image'] = $image;
        }
        $galleries->user_id=Auth::user()->id;
        $galleries->save();
        return redirect()->route('gallery')->with('success', 'Gallery added successfully.');

    }
    public function delete($id)
    {
        $galleries = Gallery::findOrFail($id);
        Storage::delete($galleries->image);
        $galleries->delete();
        return redirect(route("gallery"))->with('success', 'image deleted successfully');
    }
}

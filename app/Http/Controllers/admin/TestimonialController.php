<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.testimonials', compact('testimonials'));
    }
    public function store(Request $request)
    {
        $testimonials =new Testimonial();
         $request->validate([
            'title' => 'required|string|max:100',
            'name' => 'required|string|max:100',
            'review' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',

        ]);
        if($request->file('image')) {
            $file = $request->file('image');
            $image = date('image') . $file->getClientOriginalName();
            $file->move(public_path('admin/img/testimonial'), $image);
            $testimonials['image'] = $image;
        }
        $testimonials->title=$request->title;
        $testimonials->name=$request->name;
        $testimonials->review=$request->review;
        $testimonials->user_id=Auth::user()->id;
        $testimonials->save();
        return redirect()->route('testimonial')->with('success', 'Testimonial added successfully.');

    }
    public function edit($id){
        $testimonials = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit',compact('testimonials'));
    }
    public function update(Request $request, $id){
        $testimonials = Testimonial::findOrFail($id);

        $request->validate([
            'title' =>'required|string|max:100',
            'name' =>'required|string|max:100',
            'review' =>'required|string',
            'image' =>'image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required'
        ]);
        if ($request->hasFile('image')) {
            $path = 'admin/img/testimonial/' . $testimonials->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('admin/img/testimonial/'), $filename);
            $testimonials->image = $filename;
        }
        $testimonials->title=$request->title;
        $testimonials->name=$request->name;
        $testimonials->review=$request->review;
        $testimonials->user_id=$request->user_id;
        $testimonials->update();
        return redirect()->route('testimonial')->with('success', 'testimonial Page updated successfully.');


    }
    public function delete($id)
    {
        $testimonials = Testimonial::findOrFail($id);
        Storage::delete($testimonials->image);
        $testimonials->delete();
        return redirect(route("testimonial"))->with('success', 'data deleted successfully');
    }
}

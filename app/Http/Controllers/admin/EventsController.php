<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.event.events', compact('events'));
    }
    public function store(Request $request)
    {
        $events =new Event();
        $request->validate([
            'title' =>'required|string|max:100',
            'desc' =>'required|string',
            'price'=>'required|integer|min:1',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required'

        ]);
        if($request->file('image')) {
            $file = $request->file('image');
            $image = date('image') . $file->getClientOriginalName();
            $file->move(public_path('admin/img/event'), $image);
            $events['image'] = $image;
        }
        $events->title=$request->title;
        $events->desc=$request->desc;
        $events->price=$request->price;
        $events->user_id=Auth::user()->id;
        $events->save();
        return redirect()->route('event')->with('success', 'Event added successfully.');

    }
    public function edit($id){
        $events = Event::findOrFail($id);
        return view('admin.event.edit',compact('events'));
    }
    public function update(Request $request, $id){
        $events = Event::findOrFail($id);

        $request->validate([
            'title' =>'required|string|max:100',
            'desc' =>'required|string',
            'price'=>'required|integer|min:1',
            'image' =>'image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required'
        ]);
        if ($request->hasFile('image')) {
            $path = 'admin/img/event/' . $events->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('admin/img/event/'), $filename);
            $events->image = $filename;
        }
        $events->title=$request->title;
        $events->desc=$request->desc;
        $events->price=$request->price;
        $events->user_id=$request->user_id;
        $events->update();
        return redirect()->route('event')->with('success', 'event Page updated successfully.');


    }
    public function delete($id)
    {
        $events = Event::findOrFail($id);
        Storage::delete($events->image);
        $events->delete();
        return redirect(route("event"))->with('success', 'data deleted successfully');
    }
}

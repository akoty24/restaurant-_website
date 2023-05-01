<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view("admin.contact.contact", ["contacts"=>$contacts]);
    }
    public function update(Request $request)
    {
        $contacts = Contact::findOrFail(1);
        $data = $request->validate([
            'map'=>'required|string',
            'address'=>'required|string',
            'email'=>'required|string|email',
            'phone'=>'required|string',
            'hours'=>'required|string',
            'user_id'=>'required'
        ]);
        $contacts->update($data);
        return redirect()->route('contact')->with('success', 'contacts updated successfully.');}
}

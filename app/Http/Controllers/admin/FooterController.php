<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::all();
        return view("admin.footer.footer", ["footer"=>$footer]);
    }
    public function update(Request $request)
    {
        $footer = Footer::findOrFail(1);
        $data = $request->validate([
            'address'=>'required|string',
            'email'=>'required|string|email',
            'phone'=>'required|string',
            'open_at'=>'required|string',
            'close_at'=>'required',
            'facebook'=>'string',
            'linkedin'=>'string',
            'instagram'=>'string',
        ]);
        $footer->update($data);
        return redirect()->route('footer')->with('success', 'footer updated successfully.');}
}

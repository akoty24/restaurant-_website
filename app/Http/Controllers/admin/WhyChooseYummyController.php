<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseYummy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhyChooseYummyController extends Controller
{
    public function index()
    {
        $wcys = WhyChooseYummy::all();
        return view('admin.why_choose_yummy', compact('wcys'));
    }
    public function update(Request $request)
    {
        $wcys = WhyChooseYummy::findOrFail(1);
        $request->validate([
            'title1' => 'required|string|max:100',
            'desc1' => 'required|string',

            'title2' => 'required|string|max:100',
            'desc2' => 'required|string',

            'title3' => 'required|string|max:100',
            'desc3' => 'required|string',

            'title4' => 'required|string|max:100',
            'desc4' => 'required|string',
        ]);

        $wcys->title1=$request->title1;
        $wcys->desc1=$request->desc1;
        $wcys->title2=$request->title2;
        $wcys->desc2=$request->desc2;
        $wcys->title3=$request->title3;
        $wcys->desc3=$request->desc3;
        $wcys->user_id=Auth::user()->id;
        $wcys->update();
        return redirect()->route('WhyChooseYummy')->with('success', 'WhyChooseYummy updated successfully.');
    }
}

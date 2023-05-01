<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SendMessage;

class MessageController extends Controller
{
    public function index(){
        $messages=SendMessage::all();
        return view('admin.messages.index',compact('messages'));
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Mail\BookTableMail;
use App\Http\Controllers\Controller;
use App\Models\BookTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookTableController extends Controller
{
    public function index()
    {
        $bookTables= BookTable::all();
        return view('admin.bookTable.book_table',compact("bookTables"));
    }

    public function create()
    {
        return view('admin.bookTable.add');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100',
            'phone'=>'required|string|max:20',
            'date'=>'required|date|after:today',
            'time'=>'required',
            'people'=> 'required|numeric|min:1|max:300',
            'message'=>'required|string',
            'user_id'=>'required',
        ]);
        $bookTable = BookTable::create($data);

        Mail::to($data->email)->send(new BookTableMail($bookTable));


        return redirect()->route('book_table')->with('message','you Booked table successfully . please wait our response to confirm your reservation');
    }
    public function edit($id)
    {
        $bookTables= BookTable::findOrFail($id);
        return view('admin.bookTable.edit',compact('bookTables'));
    }
    public function update(Request $request, $id)
    {
        $bookTables = BookTable::findOrFail($id);
        $data = $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100',
            'phone'=>'required|string|max:20',
            'date'=>'required|date|after:today',
            'time'=>'required',
            'people'=> 'required|numeric|min:1|max:300',
            'message'=>'required|string',
            'user_id'=>'required'
        ]);
        $bookTables->update($data);
        return redirect()->route('book_table')->with('message', 'bookTables updated successfully.');
    }
    public function delete($id)
    {
        $bookTables = BookTable::findOrFail($id);
        $bookTables->delete();
        return redirect()->route('book_table')->with('message', 'BookTable deleted successfully');
    }
}

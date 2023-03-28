<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BookTable;
use App\Models\ConfirmedBookTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmedBookTableController extends Controller
{
    public function index()
    {
        $confirmedBookTables = ConfirmedBookTable::paginate(10);
        return view("admin.confirmedBookTable.index",["confirmedBookTables"=>$confirmedBookTables]);
    }
    public function confirmFromHome(Request $request, $id)
    {
        $request->validate([
            'book_table_id'=>'unique:book_table_id'
        ]);
        $bookTable = BookTable::findOrFail($id);
        if($bookTable){
            ConfirmedBookTable::create([
                'name'=>$bookTable->name,
                'email'=>$bookTable->email,
                'phone'=>$bookTable->phone,
                'date'=>$bookTable->date,
                'time'=>$bookTable->time,
                'people'=> $bookTable->people,
                'message'=>$bookTable->message,
                'book_table_id'=>$bookTable->id,
                'user_id'=>Auth::user()->id
            ]);
            BookTable::destroy($id);
        }
        return redirect(url('/dashboard'));

    }

    public function delete($id)
    {
        ConfirmedBookTable::destroy($id);
        return redirect()->route("ConfirmedBookTable")->with('success', 'data deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories= Category::paginate(5);
        return view('admin.category.category',compact("categories"));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>'required|string|max:100',
            'user_id'=>'required'
        ]);
        Category::create($data);
        return redirect()->route('category');
    }
    public function edit($id)
    {
        $categories= Category::findOrFail($id);
        return view('admin.category.edit',compact('categories'));
    }
    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        $data = $request->validate([
            'name' =>'required|string|max:100',
            'user_id'=>'required'
        ]);
        $categories->update($data);
        return redirect()->route('category')->with('success', 'categories updated successfully.');
    }
    public function delete($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        return redirect()->route('category')->with('success', 'Category deleted successfully');
    }
}

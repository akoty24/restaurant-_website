<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        $categories= Category::all();
        return view("admin.product.product",compact('products','categories'));
    }
    public function create()
    {
        $products = Product::all();
        $categories= Category::all();
        return view("admin.product.add",compact('products','categories'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>'required|string|max:100',
            'desc' =>'required|string',
            'category_id'=>'required|integer',
            'price'=>'required|integer|min:1',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required',

        ]);
        if($request->file('image')) {
            $file = $request->file('image');
            $image = date('image') . $file->getClientOriginalName();
            $file->move(public_path('admin/img/product'), $image);
            $data['image'] = $image;
        }
        Product::create($data);
        return redirect()->route('product');
    }
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $categories= Category::all();

        return view("admin.product.edit", compact('products','categories'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' =>'required|string|max:100',
            'desc' =>'required|string',
            'category_id'=>'required|integer',
            'price'=>'required|integer|min:1',
            'image' =>'image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required',

        ]);

        $products = Product::findOrFail($id);
        if($request->file('image')) {
            $file = $request->file('image');
            $image = date('image') . $file->getClientOriginalName();
            $file->move(public_path('admin/img/product'), $image);
            $data['image'] = $image;
        }
        $products->update($data);
        return redirect()->route('product')->with('success', 'products updated successfully.');
    }
    public function delete($id)
    {
        $products = Product::findOrFail($id);
        Storage::delete($products->image);
        $products->delete();
        return redirect()->route('product')->with('success', 'product deleted successfully');
    }

}

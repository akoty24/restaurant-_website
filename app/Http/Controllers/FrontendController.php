<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\BookTable;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Contact;
use App\Models\Cover;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\WhyChooseYummy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class FrontendController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        $chefs = Chef::all();
        $contacts = Contact::all();
        $covers = Cover::all();
        $events = Event::all();
        $galleries = Gallery::all();
        $categories = Category::all();
        $products = Product::all();
        $testimonials = Testimonial::all();
        $wcys = WhyChooseYummy::all();

        return view('front.index', [

            "abouts" => $abouts,
            "chefs" => $chefs,
            "contacts" => $contacts,
            "covers" => $covers,
            "events" => $events,
            "galleries" => $galleries,
            "categories" => $categories,
            "products" => $products,
            "testimonials" => $testimonials,
            "wcys" => $wcys,
        ]);
    }
    public function submitBookTable(Request $request)
    {

        $data = $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100',
            'phone'=>'required|string|max:20',
            'date'=>'required|date|after:today',
            'time'=>'required',
            'people'=> 'required|numeric|min:1|max:300',
            'message'=>'required|string',
            'user_id'=>'nullable'
        ]);

          BookTable::create($data);

        return redirect(url('/#book-a-table'))->with('you Booked table successfully . please wait our response to confirm your reservation');
    }

}

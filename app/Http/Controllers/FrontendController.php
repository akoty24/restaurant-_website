<?php

namespace App\Http\Controllers;

use App\Mail\BookTableMail;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\BookTable;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Contact;
use App\Models\Cover;
use App\Models\Event;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\SendMessage;
use App\Models\Testimonial;
use App\Models\WhyChooseYummy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $abouts = About::all();
        $chefs = Chef::all();
        $covers = Cover::all();
        $events = Event::all();
        $galleries = Gallery::all();
        $categories = Category::paginate(6);
        $testimonials = Testimonial::all();
        $wcys = WhyChooseYummy::all();
        $contacts = Contact::all();
        $footer = Footer::all();

        $cat = $request->get('category') ?? null;
        $products=new Product();

        if ($cat){
            $category = Category::where('id' , $cat)->first();
            $products = $products->where('category_id' , (int)$category?->id);
            $categoryName = $category->name;
        }

        $products = $products->inRandomOrder()->paginate(6)->withQueryString();


        return view('front.index', compact('abouts','chefs','contacts','covers','events','galleries','categories','products','testimonials','wcys','footer'))->with([
            'categoryName'=>$categoryName?? null,
            ]);
    }



    public function submitBookTable(Request $request)
    {
        if (@Auth::user()){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after:today',
            'time' => 'required',
            'people' => 'required|numeric|min:1|max:300',
        ]);
        $bookTable = new BookTable();

            $bookTable->name = $request->name;
        $bookTable->email = $request->email;
        $bookTable->phone = $request->phone;
        $bookTable->date = $request->date;
        $bookTable->time = $request->time;
        $bookTable->people = $request->people;
        $bookTable->message = $request->message;
        $bookTable->user_id = Auth::user()->id;
        $bookTable->save();

        Mail::to($bookTable->email)->send(new BookTableMail($bookTable));
        return redirect()->route('index')->with('message', 'you Booked table successfully please wait our response to confirm your reservation');
    }else{
            return redirect()->route('login')->with('message', 'login in to book table');
        }
    }
    public function sendMessage(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100',
            'subject'=>'string',
            'message'=>'required',
        ]);
        $SendMessage=SendMessage::create($data);
        Mail::to($SendMessage->email)->send(new ContactMail($SendMessage));
        return redirect()->route('index')->with('message','Message send success');
    }

}

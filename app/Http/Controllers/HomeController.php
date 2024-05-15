<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\category;
use App\Models\super_category;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('q_book', 'super_cat_book');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $books = book::all();
        $categories = category::all();
        $super_categories = super_category::all();
        return view('home', compact('books', 'categories', 'super_categories'),);
    }

    public function q_book(Request $request)
    {
        $super_categories = super_category::all();
        $request->validate([

            'q' => ['string'],
        ]);
        $books = book::where('book_name', 'like', '%' . $request->q . '%')->get();

        return view('welcome', compact('books', 'super_categories'),);
    }


    public function super_cat_book(Request $request)
    {
        $super_categories = super_category::all();
        foreach ($super_categories as $super_category) {
            if ($request->super_cat_name == $super_category->name) {

                $categories = category::where('super_category_id', $super_category->id)->get();
                foreach ($categories as $category) {

                    $books = book::where('category_id', $category->id)->get();
                }
            } else if ($request->super_cat_name == 'literary') {

                $categories = category::where('super_category_id', 2)->get();
                foreach ($categories as $category) {

                    $books = book::where('category_id', $category->id)->get();
                }
            }
            return  view('welcome', compact('books', 'super_categories'));
        }
    }
}

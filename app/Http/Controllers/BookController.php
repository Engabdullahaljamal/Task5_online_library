<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class BookController extends Controller
{
    public Integer $i;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = book::all();
        $categories = category::all();
        return view('welcome', compact('books'), compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name' => ['string'],
            'book_author_name' => ['string'],
            'category_id' => ['required', 'exists:categories,id'],
            'rate' => ['integer'],
        ]);
        book::create([
            'book_name' => $request->book_name,
            'book_author_name' => $request->book_author_name,
            'category_id' => $request->category_id,
            'rate' => $request->rate,
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        $categories = category::all();
        return view('book.edit', compact('book'), compact('categories'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {


        $request->validate([
            'book_name' => ['string'],
            'book_author_name' => ['string'],
            'category_id' => ['required', 'exists:categories,id'],
            'rate' => ['integer'],
        ]);

        $book->book_name = $request->book_name;
        $book->book_author_name = $request->book_author_name;
        $book->category_id = $request->category_id;
        $book->rate = $request->rate;
        $book->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\super_category;
use Illuminate\Http\Request;

class SuperCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super_category.create');
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
            'name' => ['string'],

        ]);
        super_category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\super_category  $super_category
     * @return \Illuminate\Http\Response
     */
    public function show(super_category $super_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\super_category  $super_category
     * @return \Illuminate\Http\Response
     */
    public function edit(super_category $super_category)
    {
        return view('super_category.edit', compact('super_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\super_category  $super_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, super_category $super_category)
    {
        $request->validate([
            'name' => ['string'],
        ]);

        $super_category->name = $request->name;
        $super_category->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\super_category  $super_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(super_category $super_category)
    {
        $super_category->delete();
        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shoes;
use Illuminate\Http\Request;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoes = Shoes::all();
        return view('home', compact("shoes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('shoes.create_shoes', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shoes = new Shoes();
        $shoes->name = $request->name;
        $shoes->price = $request->price;
        $shoes->size = $request->size;
        $shoes->description = $request->description;
        return redirect('categories');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function show(Shoes $shoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoes $shoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoes $shoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoes $shoes)
    {
        //
    }
}

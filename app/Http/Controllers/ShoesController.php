<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $shoe = new Shoes();
        $shoe->name = $request->name;
        $shoe->category_id = $request->category;
        $shoe->price = $request->price;
        $shoe->size = $request->size;
        $shoe->description = $request->description;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('images/', $filename);
            $shoe->image = $filename;
        }
        $shoe->save();
        return redirect('shoes');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shoe = Shoes::find($id);
        return view('shoes.show_shoes', compact('shoe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shoe = Shoes::find($id);
        $categories = Category::all();
        return view('shoes.edit_shoes', compact('categories', 'shoe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shoe = Shoes::find($id);
        $shoe->name = $request->name;
        $shoe->category_id = $request->category;
        $shoe->price = $request->price;
        $shoe->size = $request->size;
        $shoe->description = $request->description;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('images/', $filename);
            $shoe->image = $filename;
        }else{
            $shoe->image =  $shoe->image;  
        }
        $shoe->save();
        return redirect('shoes'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function destroyShoe($id) 
    {
        $shoe = Shoes::find($id);
        $shoe->delete();
        return redirect('shoes');
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function viewCart($userid)
    {
        $card = DB::select( DB::raw("SELECT * FROM order_item WHERE user_id = '$userid'") );
        return view('shoes.add_cart');
    }
}

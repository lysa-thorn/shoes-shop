<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function show()
    {
        return view('shoes.cart');
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
        } else {
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

    public function destroyShoe($id){
        $shoe = Shoes::find($id);
        $shoe->delete();
        return redirect('shoes');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
       if (!Auth::user()) {
            return redirect('login');
        } else {
        $shoe = Shoes::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $shoe->name,
                "quantity" => 1,
                "price" => $shoe->price,
                "image" => $shoe->image
            ];
        }
          
        session()->put('cart', $cart);

        }
        return redirect()->back()->with('success', 'Shoes added to cart successfully!');
        
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updateCard(Request $request)
    {
        if($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Shoes Cart successfully');
        }
    }
}
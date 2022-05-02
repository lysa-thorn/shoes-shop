@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <img class="shoe-thumb" src="{{asset('images/'.$shoe->image)}}">
        </div>
        <div class="col-1"></div>
        <div class="col-md-7">
            <h5 class="shoe-name">{{$shoe->name}}</h5>
            <label for="size"> <b> Price : {{$shoe->price}}$</b> </label><br>
            <label for="size"> <b>Size : {{$shoe->size}}</b></label>
            <p>{{$shoe->description}}</p>
            <form action="{{route('shoes.addToCart')}}" method="POST">
                @csrf
                <input type="hidden" name="shoe_id" value="{{$shoe->id}}">
                <input type="hidden" name="price" value="{{$shoe->price}}">
                <label for="quantity">Quantity</label>
                <input type="number"  name="quantity" value="1" min="1" class="form-control col-4" required><br>
                <input type="submit" class="main-btn btn" value="Add to cart">
            </form>
            <br>
            <a type="button" href="{{ route('stripe') }}" class="btn btn-success">Checkout</a>
        </div>
    </div>
</div>
@endsection
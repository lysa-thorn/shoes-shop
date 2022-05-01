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
            <label for="size"> <b>Size : {{$shoe->size}}$</b></label>
            <p>{{$shoe->description}}$</p>
            <form action="" method="POST">
                <input type="submit" class="main-btn btn" value="Add to card">
            </form>
        </div>
    </div> 
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('shoes.create')}}" class="btn float-right">Add New</a>
        </div>
        @foreach($shoes as $shoe)
        <div class="col-md-3">
            <ul class="list-group mt-5">
                <div class="card">
                    <div class="card-header">image</div>
                    <div class="card-body">
                        <h2>{{$shoe->name}}</h2>
                        <p><b>ID: </b>{{$shoe->id}}</p>
                        <p><b>Price: </b>{{$shoe->price}}</p>
                        <p><b>Size: </b>{{$shoe->size}}</p>
                        <a href="#" class="main-btn btn float-right">More</a>
                    </div>
                </div>
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('images/slide1.jpg')}}">
        </div>
        <div class="carousel-item">
            <img src="{{asset('images/slide2.jpg')}}">
        </div>
        <div class="carousel-item">
            <img src="{{asset('images/slide3.jpg')}}">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('shoes.create')}}" class="main-btn btn float-right">Add New</a>
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
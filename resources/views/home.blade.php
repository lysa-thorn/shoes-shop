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
    <div class="row">
        <div class="col-md-12">
            @if (Auth::user())
            @if (Auth::user()->is_admin == 1)
            <a href="{{route('shoes.create')}}" class="main-btn btn float-right">Add New</a>
            @endif
            @endif
        </div>
        @foreach($shoes as $shoe)
        <div class="col-md-3">
            <ul class="list-group mt-5">
                <a href="{{route('shoes.show', $shoe->id)}}" class="shoe-detail">
                    <div class="card">
                        <div class="card-header shoe-thumb-card">
                            <img class="shoe-thumb" src="{{asset('images/'.$shoe->image)}}">
                        </div>
                        <div class="card-body shoe-info">

                            <h5 class="shoe-name">{{$shoe->name}}</h5>
                            <p class="shoe-price"><b>{{$shoe->price}}$</b></p>
                            @if (Auth::user())
                            @if (Auth::user()->is_admin == 1)
                            <div class="dropdown show float-right">
                                <a id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons main-btn">more_vert</i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a href="{{route('shoes.edit', $shoe->id)}}" class="dropdown-item">Update</a>
                                    <a class="dropdown-item" href="{{route('shoes.destroy', $shoe->id)}}" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                </div>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>
                </a>
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection
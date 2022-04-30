@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Shoes</h4></div>
                <div class="card-body">
                <form action="{{route('categories.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <a href="#" class="main-btn btn float-right">Cancel</a>
                        <input type="submit"  value="Save" class="main-btn btn float-right">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
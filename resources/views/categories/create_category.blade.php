@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Categories</h4></div>
                <div class="card-body">
                <form action="{{route('categories.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <a href="{{route('categories.index')}}" class="float-right btn btn-danger">Cancel</a>
                        <input type="submit"  value="Save" class="main-btn btn">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Categories</h4></div>
                <div class="card-body">
                <form action="{{route('categories.update', $category->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{$category->name}}" name="category" class="form-control">
                            <input type="submit" value="Update" class="btn main-btn mt-2">
                            <a href="{{route('categories.index')}}" class="float-right btn btn-danger mt-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
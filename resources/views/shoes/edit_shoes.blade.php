@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Shoes</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('shoes.update', $shoe->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{$shoe->name}}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select name="category" id="" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" value="{{$shoe->price}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="size">Size</label>
                            <input type="number" name="size" value="{{$shoe->size}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="size">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="" cols="61" rows="2">{{$shoe->description}}</textarea>
                        </div>
                        <input type="submit" class="btn main-btn" value="Save">
                        <a href="{{route('home')}}" class="btn btn-danger float-right">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
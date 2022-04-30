@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Shoes</h4></div>
                <div class="card-body">
                    <form action="" method>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="size">Size</label>
                            <input type="number" name="size" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="size">Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="61" rows="2"></textarea>
                        </div>
                        <a href="#" class="main-btn btn ">Save</a>
                        <a href="{{route('home')}}" class="btn btn-danger float-right">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

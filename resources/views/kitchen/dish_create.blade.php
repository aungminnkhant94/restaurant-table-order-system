@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Create Dish</h3>
        <a class="btn btn-default" href="/dishes"style="float:right;">Back</a>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ol>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    <!-- /.card-header -->
    <div class="card-body">
        <form action="/dishes"method="POST"enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text"name="name"value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category"class="form-control" id="">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }} ">{{ $cat->name }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file"name="dish_image">
            </div>

            <button type="submit"class="btn btn-success">Submit</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

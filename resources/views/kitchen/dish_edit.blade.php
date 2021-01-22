@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Dish</h3>
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
        <form action="/dishes/{{ $dish->id }}"method="POST"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text"name="name"value="{{ old('name' , $dish->name) }}">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category"class="form-control" id="">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"{{ $cat->id == $dish->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <img src="{{ url('/images/'.$dish->image) }}"width="100"height="100">
                <input type="file"name="dish_image">
            </div>

            <button type="submit"class="btn btn-success">Submit</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

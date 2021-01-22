@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Dishes</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if (session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
      @endif
      <table id="dishes" class="table table-bordered table-striped">
      <a class="btn btn-success" href="{{ route('dishes.create') }}">Create Dish</a>
        <thead>
        <tr>
          <th>Name</th>
          <th>Category Name</th>
          <th>Dish created at</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dishes as $dish)
        <tr>
          <td>{{ $dish->name }}</td>
          <td>{{ $dish->category->name}}</td>
          <td>{{ $dish->created_at }}</td>
          <td>
          <div class="form-row">
            <a style="height:50px;margin-right:10px;" href="/dishes/{{ $dish->id }}/edit"class="btn btn-secondary">Edit</a> 
            <a class="btn btn-danger" href="#"data-toggle="modal" data-target="#exampleModal{{ $dish->id }}">Delete</a>
          <!--Bootstrap Modal-->
          <div class="modal fade" id="exampleModal{{ $dish->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form action="{{ route('dishes.destroy',[$dish->id]) }}"method="POST">
                @csrf
                @method('DELETE')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-warning">Delete</button>
                </div>
              </div>
              </form>
            </div>
          </div>
          <!--End Modal-->
          </div>
          </td>
        </tr>
        @endforeach
        </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script>
    $(function () {
      $("#dishes").DataTable({
        "responsive": true, 
        "lengthChange": false, 
        "pagelength" : 10,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
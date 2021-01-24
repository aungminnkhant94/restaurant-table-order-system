@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Orders Lists</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if (session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
      @endif
      <table id="dishes" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Dish Name</th>
          <th>Table Number</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
          <td>{{ $order->dish->name }}</td>
          <td>{{ $order->table_id}}</td>
          <td>{{ $status[$order->status]}}</td>
          <td>
          <div class="">
            <a href="/orders/{{ $order->id }}/approve"class="btn btn-info">Approve</a>
            <a href="/orders/{{ $order->id }}/cancel"class="btn btn-warning">Cancel</a>
            <a href="/orders/{{ $order->id }}/ready"class="btn btn-success">Ready</a>
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
        "searching" : false,
        "lengthChange": false, 
        "pagelength" : 10,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
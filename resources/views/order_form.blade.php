<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                  <h4>Order Form </h4>
                </div>
              </div>
              @if (session('message'))
                  <div class="alert alert-success">
                      {{ session('message') }}
                  </div>
              @endif
              <!-- ./row -->
              <div class="row">
                <div class="col-12 col-sm-6 col-lg-12">
                  <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                      <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order Listings</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                           <form action="{{ route('order.submit') }}"method="POST">
                               @csrf
                               <div class="row">
                                @foreach($dishes as $dish)
                                <div class="col-sm-3">
                                  <div class="card">
                                    <div class="card-body">
                                        <img src="{{ url('/images/'.$dish->image) }}"width="100"height="100"class="mb-2">
                                        <br>
                                        <label for="">{{ $dish->name }}</label>
                                        <br>
                                        <input type="number"name="{{ $dish->id }}">
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                              </div>
                              <div class="form-group">
                                  <select name="table" id="">
                                      <option value="Choose Table" class="form-control">Choose Table</option>
                                      @foreach($tables as $table)
                                        <option value="{{ $table->id }}" class="form-control">{{ $table->number }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <input type="submit"class="btn btn-primary"value="Submit">
                           </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                           Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
                        </div>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
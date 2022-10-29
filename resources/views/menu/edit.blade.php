@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Edit Menu</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form action="" method="POST">
                @csrf
                <div class="card-body">
                 <div class="card-body">
                  <div class="mb-3">
                    <label>Menu name</label>
                    <input type="text" class="form-control" name="menu_name" value="{{ $table->menu_name }}" required="">
                  </div>
                  <div class="mb-3">
                    <label>Route Name</label>
                    <input type="text" class="form-control" name="menu_link" value="{{ $table->menu_link }}">
                  </div>
                  <div class="mb-3">
                    <label>Menu icon</label>
                    <input type="text" class="form-control" name="menu_icon" value="{{ $table->menu_icon }}" required="">
                  </div>
                  <div class="mb-3">
                    <label>Parent</label>
                    <select class="form-control form-control-sm h-75" name="parent_id">
                      <option value="0">Non Parent</option>
                      @foreach($table_menu as $row)
                      <option value="{{ $row->menu_id }}" {{ $row->menu_id == $table->parent_id ? 'selected' : ''}}>{{ $row->menu_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  {{--<div class="mb-3">
                    <label>Level</label>
                    <input type="text" class="form-control" name="id_level" value="{{ $table->id_level }}" required="">
                  </div>--}}
                </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>

      </div>

    </div><!-- End Container-->
  </div><!-- End Content-->
@endsection

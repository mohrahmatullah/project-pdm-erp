@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Create User</h1>
      </div>
            
      <div class="row">

          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form action="" method="POST">
                @csrf
                <div class="card-body">
                  <div class="mb-3">
                    <label>Name user</label>
                    <input type="text" class="form-control" name="name_user" required="">
                  </div>
                  <div class="mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required="">
                  </div>
                  <div class="mb-3">
                    <label>password</label>
                    <input type="password" class="form-control" name="password" required="">
                  </div>
                  <div class="mb-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" required="">
                  </div>
                  <div class="mb-3">
                    <label>WhatsApp</label>
                    <input type="text" class="form-control" name="wa" required="">
                  </div>
                  <div class="mb-3">
                    <label>Pin</label>
                    <input type="text" class="form-control" name="pin" required="">
                  </div>
                  {{--<div class="mb-3">
                    <label>id_jenis_user</label>
                    <input type="text" class="form-control" name="id_jenis_user" required="">
                  </div>--}}
                  <div class="mb-3">
                    <label>Status</label>
                    <select class="form-control form-control-sm" name="status_user">
                      <option value="active">Active</option>
                      <option value="non_active">Non Active</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Menu User</label>
                    <select class="form-control form-control-sm multiple" name="menu_user[]" multiple="multiple">
                      @foreach($select_menu as $row)
                      <option value="{{ $row->menu_id }}">{{ $row->menu_name }}</option>
                      @endforeach
                    </select>
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

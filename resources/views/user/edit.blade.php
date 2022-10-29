@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Edit User</h1>
      </div>

      <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form action="" method="POST">
                @csrf
                <div class="card-body">
                  <div class="mb-3">
                    <label>Name user</label>
                    <input type="text" class="form-control" name="name_user" value="{{ $table->name_user }}" required="">
                  </div>
                  <div class="mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $table->username }}" required="">
                  </div>
                  <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="">
                  </div>
                  <div class="mb-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $table->email }}" required="">
                  </div>
                  <div class="mb-3">
                    <label>WhatsApp</label>
                    <input type="text" class="form-control" name="wa" value="{{ $table->wa }}" required="">
                  </div>
                  <div class="mb-3">
                    <label>Pin</label>
                    <input type="text" class="form-control" name="pin" value="{{ $table->pin }}" required="">
                  </div>
                  {{--<div class="mb-3">
                    <label>id_jenis_user</label>
                    <input type="text" class="form-control" name="id_jenis_user" value="{{ $table->id_jenis_user }}" required="">
                  </div>--}}
                  <div class="mb-3">
                    <label>Status</label>
                    <select class="form-control form-control-sm" name="status_user">
                      <option value="active" {{ $table->status_user == 'active' ? 'selected' : ''}}>Active</option>
                      <option value="non_active" {{ $table->status_user == 'non_active' ? 'selected' : ''}}>Non Active</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Menu User</label>
                    <select class="form-control form-control-sm multiple" name="menu_user[]" multiple="multiple">
                      @foreach($select_menu as $row)
                      <option value="{{ $row->menu_id }}" {{ in_array($row['menu_id'], $selected_menu ) ? 'selected':'' }}>{{ $row->menu_name }}</option>
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

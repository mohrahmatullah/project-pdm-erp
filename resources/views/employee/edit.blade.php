@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Edit Designation</h1>
      </div>

      <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form action="" method="POST">
                @csrf
                <div class="card-body">
                  <div class="mb-3">
                    <label>Branch</label>
                    <select class="form-control form-control-sm" name="branch_id">
                      @foreach($branch as $row)
                      <option value="{{ $row->id }}" {{ $row->id == $table->branch_id ? 'selected': '' }}>{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div>   
                  <div class="mb-3">
                    <label>Departement</label>
                    <select class="form-control form-control-sm" name="department_id">
                      @foreach($departement as $row)
                      <option value="{{ $row->id }}" {{ $row->id == $table->department_id ? 'selected': '' }}>{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Designation</label>
                    <select class="form-control form-control-sm" name="designation_id">
                      @foreach($designation as $row)
                      <option value="{{ $row->id }}" {{ $row->id == $table->designation_id ? 'selected': '' }}>{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $table->name }}" required="">
                  </div>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <label>Date Of Birth</label>
                    <input type="date" class="form-control" name="dob" value="{{ $table->dob }}">
                  </div>
                  <div class="mb-3">
                    <label>Gender</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" value="pria" id="flexRadioDefault1" {{ $table->gender == 'pria' ? 'checked' : ''}}>
                      <label class="form-check-label" for="flexRadioDefault1">
                        Pria
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" value="wanita" id="flexRadioDefault2" {{ $table->gender == 'wanita' ? 'checked' : ''}}>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Wanita
                      </label>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $table->phone }}">
                  </div>
                  <div class="mb-3">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $table->address }}">
                  </div>
                  <div class="mb-3">
                    <label>Account Number</label>
                    <input type="text" class="form-control" name="account_number" value="{{ $table->account_number }}">
                  </div>
                  <div class="mb-3">
                    <label>Bank Name</label>
                    <input type="text" class="form-control" name="bank_name" value="{{ $table->bank_name }}">
                  </div>
                  <div class="mb-3">
                    <label>Sallary</label>
                    <input type="number" class="form-control" name="salary" value="{{ $table->salary }}">
                  </div>
                  <div class="mb-3">
                    <label>Is Active</label>
                    <select class="form-control form-control-sm" name="is_active">
                      <option value="1" {{ $table->is_active == 1 ? 'selected' : '' }}>Active</option>
                      <option value="0" {{ $table->is_active == 0 ? 'selected' : '' }}>Non Active</option>
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

@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Create Designation</h1>
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
                      <option value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div>                  
                  <div class="mb-3">
                    <label>Departement</label>
                    <select class="form-control form-control-sm" name="department_id">
                      @foreach($departement as $row)
                      <option value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Designation</label>
                    <select class="form-control form-control-sm" name="designation_id">
                      @foreach($designation as $row)
                      <option value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Employee Name</label>
                    <input type="text" class="form-control" name="name" required="">
                  </div>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <label>Date Of Birth</label>
                    <input type="date" class="form-control" name="dob">
                  </div>
                  <div class="mb-3">
                    <label>Gender</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" value="pria" id="flexRadioDefault1" checked>
                      <label class="form-check-label" for="flexRadioDefault1">
                        Pria
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" value="wanita" id="flexRadioDefault2">
                      <label class="form-check-label" for="flexRadioDefault2">
                        Wanita
                      </label>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone">
                  </div>
                  <div class="mb-3">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address">
                  </div>
                  <div class="mb-3">
                    <label>Account Number</label>
                    <input type="text" class="form-control" name="account_number">
                  </div>
                  <div class="mb-3">
                    <label>Bank Name</label>
                    <input type="text" class="form-control" name="bank_name">
                  </div>
                  <div class="mb-3">
                    <label>Sallary</label>
                    <input type="number" class="form-control" name="salary">
                  </div>
                  <div class="mb-3">
                    <label>Is Active</label>
                    <select class="form-control form-control-sm" name="is_active">
                      <option value="1">Active</option>
                      <option value="0">Non Active</option>
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

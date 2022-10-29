@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Create Leave</h1>
      </div>
            
      <div class="row mt-5">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form action="" method="POST">
                @csrf
                <div class="card-body">
                  <div class="mb-3">
                    <label>Employee</label>
                    <select class="form-control form-control-sm" name="employee_id">
                      @foreach($employee as $row)
                      <option value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Leave Type</label>
                    <select class="form-control form-control-sm" name="leave_type_id">
                      @foreach($leave_type as $row)
                      <option value="{{ $row->id }}">{{ $row->title }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Start Date</label>
                    <input type="date" class="form-control" name="start_date" required="">
                  </div>
                  <div class="mb-3">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="end_date" required="">
                  </div>
                  <div class="mb-3">
                    <label>Leave Reason</label>
                    <input type="text" class="form-control" name="leave_reason" required="">
                  </div>
                  <div class="mb-3">
                    <label>Remark</label>
                    <input type="text" class="form-control" name="remark" required="">
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

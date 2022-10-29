@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Edit Leave</h1>
      </div>

      <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form action="" method="POST">
                @csrf
                <div class="card-body">
                  <div class="mb-3">
                    <label>Employee</label>
                    <select class="form-control form-control-sm" name="employee_id">
                      @foreach($employee as $row)
                      <option value="{{ $row->id }}" {{ $table->employee_id == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Leave Type</label>
                    <select class="form-control form-control-sm" name="leave_type_id">
                      @foreach($leave_type as $row)
                      <option value="{{ $row->id }}" {{ $table->leave_type_id == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Start date</label>
                    <input type="date" class="form-control" name="start_date" value="{{ $table->start_date }}" required="">
                  </div>
                  <div class="mb-3">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="end_date" value="{{ $table->end_date }}" required="">
                  </div>
                  <div class="mb-3">
                    <label>Leave Reason</label>
                    <input type="text" class="form-control" name="leave_reason" value="{{ $table->leave_reason }}" required="">
                  </div>
                  <div class="mb-3">
                    <label>Remark</label>
                    <input type="text" class="form-control" name="remark" value="{{ $table->remark }}" required="">
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

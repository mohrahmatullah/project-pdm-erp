@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Show Leave</h1>
      </div>

      <div class="row mt-5">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form action="" method="POST">
                @csrf
                <div class="card-body bg-light">                  
                  <table class="table table-hover">
                    <tbody>
                      <tr role="row">
                          <th>Employee</th>
                          <td>{{ \App\Models\Employee::find($table->employee_id)->name }}</td>
                      </tr>
                      <tr>
                          <th>Leave Type </th>
                          <td>{{ \App\Models\Leave_type::find($table->leave_type_id)->title }}</td>
                      </tr>
                      <tr>
                          <th>Appplied On</th>
                          <td>{{ date('d M Y', strtotime($table->applied_on)) }}</td>
                      </tr>
                      <tr>
                          <th>Start Date</th>
                          <td>{{ date('d M Y', strtotime($table->start_date)) }}</td>
                      </tr>
                      <tr>
                          <th>End Date</th>
                          <td>{{ date('d M Y', strtotime($table->end_date)) }}</td>
                      </tr>
                      <tr>
                          <th>Leave Reason</th>
                          <td>{{ $table->leave_reason }}</td>
                      </tr>
                      <tr>
                          <th>Status</th>
                          <td>{{ $table->status }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer bg-light">
                  <button class="btn btn-primary" type="submit">Approve</button>
                  <!-- <button class="btn btn-warning">Reject</button> -->
                </div>
              </form>
            </div>
          </div>

      </div>

    </div><!-- End Container-->
  </div><!-- End Content-->
@endsection

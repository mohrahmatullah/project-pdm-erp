@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')
<div class="content-start transition">
  <div class="container-fluid dashboard">
    <div class="content-header">
      <h1>Leave</h1>
      <p></p>
    </div>
    
    <div class="row">

      @if($alert_toast = Session::get('alert_toast'))
          <div class="col-12 mb-4">
            <div class="hero bg-primary text-white">
              <div class="hero-inner">
                <h2>{{$alert_toast['title']}}</h2>
                <p class="lead">{{$alert_toast['text']}}</p>
              </div>
            </div>
          </div>
      @endif

      <div class="col-md-3">
        <div class="card">
          <div class="px-4">
              <a href="{{ route('create-leave') }}" class='btn btn-block btn-xl btn-primary font-bold mt-3'>Create Leave</a>
            </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-body bg-light"> 
            <div class="table-responsive"> 
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Leave Type</th>
                    <th scope="col">Applied On</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Total Days</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($table as $row)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ \App\Models\Employee::find($row->employee_id)->name }}</td>
                    <td>{{ \App\Models\Leave_type::find($row->leave_type_id)->title }}</td>
                    <td>{{ $row->applied_on }}</td>
                    <td>{{ $row->start_date }}</td>
                    <td>{{ $row->end_date }}</td>
                    @php
                        $start = new \DateTime($row->start_date);
                        $end = new \DateTime($row->end_date);
                        $end->modify('+1 day');

                        $interval = $end->diff($start);
                        $days = $interval->days;
                        $period = new DatePeriod($start, new DateInterval('P1D'), $end);

                        $holidays = array('2016-07-22','2016-07-21');

                        foreach($period as $dt) {
                            $curr = $dt->format('D');
                            if (in_array($dt->format('Y-m-d'), $holidays)) {
                               $days--;
                            }

                            if ($curr == 'Sat' || $curr == 'Sun') {
                                $days--;
                            }
                        }
                    @endphp
                    <td>{{ $days }}</td>
                    <td>{{ $row->status }}</td>
                    <td>{{ date('d M Y', strtotime($row->created_at)) }}</td>
                    <td>
                      <a href="{{route('show-leave', $row->id)}}" class="btn btn-secondary btn-sm">Show</button>
                      <a href="{{route('edit-leave', $row->id)}}" class="btn btn-primary btn-sm">Edit</button>
                      <a href="{{route('delete-leave', $row->id)}}" class="btn btn-warning btn-sm">Hapus</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {!! $table->appends(Request::capture()->except('page'))->render('layouts.paginate') !!}
            </div>
          </div>
        </div>
      </div>

     </div>
  </div>
</div>
@endsection

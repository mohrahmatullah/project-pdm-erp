@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')
<div class="content-start transition">
  <div class="container-fluid dashboard">
    <div class="content-header">
      <h1>Leave Type</h1>
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
              <a href="{{ route('create-leave-type') }}" class='btn btn-block btn-xl btn-primary font-bold mt-3'>Create Leave Type</a>
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
                    <th scope="col">Title</th>
                    <th scope="col">Days</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($table as $row)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->days }}</td>
                    <td>{{ date('d M Y', strtotime($row->created_at)) }}</td>
                    <td>
                      <a href="{{route('edit-leave-type', $row->id)}}" class="btn btn-primary btn-sm">Edit</button>
                      <a href="{{route('delete-leave-type', $row->id)}}" class="btn btn-warning btn-sm">Hapus</button>
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

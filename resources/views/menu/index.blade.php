@extends('includes.default')
@section('title', 'PDM | Dashboard')
@section('content')

<div class="content-start transition">
  <div class="container-fluid dashboard">
    <div class="content-header">
      <h1>Menu Management</h1>
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
              <a href="{{ route('create-menu') }}" class='btn btn-block btn-xl btn-primary font-bold mt-3'>Create Menu</a>
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
                    <th scope="col-0">#</th>
                    <th scope="col-1">Menu Name</th>
                    <th scope="col-1">Route Name</th>
                    <th scope="col-1">Menu Icon</th>
                    <th scope="col-1">Parent Menu</th>
                    <th scope="col-1">Create Date</th>
                    <th scope="col-1">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($table as $row)
                  <tr>
                    <th scope="row">{{ $loop->iteration + $table->firstItem() - 1 }}</th>
                    <td>{{ $row->menu_name }}</td>
                    <td>{{ $row->menu_link }}</td>
                    <td>{{ $row->menu_icon }}</td>
                    <td>{{ $row->parent_id > 0 ? \App\Models\Menu::where('menu_id',$row->parent_id)->first()->menu_name : 'Non Parent' }}</td>
                    <td>{{ date('d M Y', strtotime($row->create_date)) }}</td>
                    <td>
                      <a href="{{route('edit-menu', $row->menu_id)}}" class="btn btn-primary btn-sm">Edit</button>
                      <a href="{{route('delete-menu', $row->menu_id)}}" class="btn btn-warning btn-sm">Hapus</button>
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

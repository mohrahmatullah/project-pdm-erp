@extends('includes.default')
@section('title', 'Error Application | Dashboard')
@section('content')
<div class="content-start transition">
  <div class="container-fluid dashboard">
    <div class="content-header">
      <h1>ERROR APPLICATION</h1>
      <p></p>
    </div>
    
    <div class="row">

      <div class="col-md-12">
        <div class="card">
          <div class="card-body bg-light"> 
            <div class="table-responsive"> 
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">User</th>
                      <th scope="col">Modules</th>
                      <th scope="col" class="col-1">Error Line</th>
                      <th scope="col">Error Messages</th>
                      <th scope="col" class="col-1">Create Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($table as $row)
                    <tr>
                      <th scope="row">{{ $loop->iteration + $table->firstItem() - 1 }} </th>
                      <td>{{ $row->id_user > 0 ? \App\Models\User::where('id', $row->id_user)->first()->username : 'Guest'}}</td>
                      <td>{{ $row->modules }}</td>
                      <td>{{ $row->error_line  }}</td>
                      <td>{{ $row->error_message  }}</td>
                      <td>{{ date('d M Y', strtotime($row->create_date)) }}</td>
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

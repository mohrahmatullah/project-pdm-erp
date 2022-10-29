@extends('includes.default')
@section('title', 'User Activity | Dashboard')
@section('content')
<div class="content-start transition">
  <div class="container-fluid dashboard">
    <div class="content-header">
      <h1>USER ACTIVITY</h1>
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
                    <th scope="col">Description</th>
                    <th scope="col">Create By</th>
                    <th scope="col">Create Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($table as $row)
                  <tr>
                    <th scope="row">{{ $loop->iteration + $table->firstItem() - 1 }} </th>
                    <td>{{ $row->id_user > 0 ? \App\Models\User::where('id', $row->id_user)->first()->username : 'Guest'}}</td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->create_by }}</td>
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

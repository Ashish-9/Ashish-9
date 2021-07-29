@extends('layouts.admin')

@section('content')

<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">
      <!-- Section: Main chart -->
      <section class="mb-4">
        <div class="card">
          <div class="card-header py-3">
            <h5 class="mb-0 text-center"><strong>Registered Users</strong></h5>
          </div>

        </div>
      </section>
      <div class="row">
          <div class = "col-md-12">
              <div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
              </div>
              <div class="card">
                <div class="card-body">
                    <div class='pb-3'>
                        <a class="badge badge-pill btn-primary px-3 py-2" href="{{ url('user-create') }}">Add User</a>
                    </div>
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Profile Pic</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Uploads</th>
                                  <th>Action</th>
                              </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $item )
                          <tr>
                              <td>{{ $item->id }}</td>
                              <td><img src = {{url('storage/profiles/'.$item->photo) }} width="80" height="80"></td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->email }}</td>
                              <td>
                                <a href="{{ url('user-uploads/'.$item->id) }}" class="badge badge-pill btn-primary px-3 py-2">View</a>
                              </td>
                              <td>
                                  <a href="{{ url('user-edit/'.$item->id) }}" class="badge badge-pill btn-primary px-3 py-2">EDIT</a>
                                  <a href="{{  url('user-delete/'.$item->id) }}" class="badge badge-pill btn-danger px-3 py-2" onclick="return confirm('Are you sure?')">DELETE</a>
                              </td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class='float-right'>
                      {{ $users->links() }}
                      </div>
                </div>
              </div>
          </div>
        </div>
  </main>
  <!--Main layout-->

@endsection

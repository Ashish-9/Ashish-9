@extends('layouts.admin')

@section('content')

<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">
      <!-- Section: Main chart -->
      <section class="mb-4">
        <div class="card">
          <div class="card-header py-3">
            <h5 class="mb-0 text-center"><strong>Uploaded Data</strong></h5>
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
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Title</th>
                                  <th>Latitude</th>
                                  <th>Longitude</th>
                                  <th>District</th>
                                  <th>Circle</th>
                                  <th>Area</th>
                                  <th>Image</th>
                                  <th>Delete</th>
                              </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $item )
                          <tr>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->desc }}</td>
                              <td>{{ $item->lat }}</td>
                              <td>{{ $item->longi }}</td>
                              <td>{{ $item->district }}</td>
                              <td>{{ $item->circle }}</td>
                              <td>{{ $item->area }}</td>
                              <td><a href='http://127.0.0.1:8000/storage/posts/{{ $item->photo }}' target='_blank'>{{ $item->photo }}</a></td>
                              <td><a href="{{  url('post-delete/'.$item->id) }}" class="badge badge-pill btn-danger px-3 py-2" onclick="return confirm('Are you sure?')">DELETE</a></td>

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

@extends('layouts.user')

@section('content')
<section style="padding-top: 90px">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <style>.profile{
                    font-family: monospace;
                    font-size: 24px;
                    text-align: center;
                    font-weight: bold;
                }</style>
                <div class="profile card-header" style="background-color: #B8DFD8;">PROFILE</div>
                <div class="card-body" style="background-color: #E8F6EF;">
                    <div class="container text-center">
                        <img src = {{url('storage/profiles/'.Auth::user()->photo) }} width="150" height="150">
                        <p class="py-2"><b>Name : {{ Auth::user()->name }}<br>Email : {{ Auth::user()->email }}</b></p>
                    </div>
                    <div><p class="profile">My Uploads</p></div>
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
</div>
</section>
@endsection

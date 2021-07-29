@extends('layouts.admin')

@section('content')

<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">
      <!-- Section: Main chart -->
      <section class="mb-4">
        <div class="card">
          <div class="card-header py-3">
            <h5 class="mb-0 text-center"><strong>Edit Users</strong></h5>
          </div>

        </div>
      </section>
      <div class="row">
          <div class = "col-md-12">
              <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ url('user-update/'.$user_edit->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                        <div class="form-group">
                    <input type="text" name="name" class="form-control" value="{{ $user_edit->name }}">
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" value="{{ $user_edit->email }}">
                </div>
                <div class="form-group">
                <button  type="submit" class="btn btn-primary">Update</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
  </div>
    </div>
</main>
<!--Main layout-->

@endsection

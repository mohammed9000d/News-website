@extends('layouts.admin')

@section('title', 'Create User')

@section('content')

@if (session()->has('alert-type'))
<div class="alert {{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
    {{ session()->get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-light">
            <div class="card-header">
                <h3 class="card-title">New user</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control" id="mobile">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

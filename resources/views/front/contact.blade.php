@extends('layouts.front')

@section('content')


<div class="content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="card aos-init aos-animate" data-aos="fade-up">
            <div class="card-body">
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
              <div class="aboutus-wrapper">
                <h1 class="mt-5 text-center mb-5">
                  Contact Us
                </h1>
                <div class="row">
                  <div class="col-lg-12 mb-5 mb-sm-2">
                    <form action="{{ route('post.message') }}" method="POST">
                        @csrf
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <textarea class="form-control textarea" placeholder="Comment *" id="message" name="message">{{ old('message') }}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" aria-describedby="name" placeholder="Name *">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" aria-describedby="email" placeholder="Email *">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-dark font-weight-bold mt-3">Send Message</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection

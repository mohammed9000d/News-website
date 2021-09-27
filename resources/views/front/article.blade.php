@extends('layouts.front')

@section('content')


<div class="content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="card aos-init aos-animate" data-aos="fade-up">
            <div class="card-body">
              <div class="aboutus-wrapper">
                <h1 class="my-5">
                  {{ $article->title }}
                </h1>


                <img src="{{ $article->image }}" alt="banner" class="img-fluid mb-5">

                <p class="font-weight-600 fs-15 text-center">
                    {{ $article->full_description }}
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@extends('layouts.front')

@section('content')


<div class="content-wrapper">
    <div class="container">
      <div class="col-sm-12">
        <div class="card aos-init aos-animate" data-aos="fade-up">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <h1 class="font-weight-600 mb-4">
                  {{ $category->name }}
                </h1>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                  @foreach ($articles as $article)
                  <a href="{{ route('page.article', [$article->id]) }}" style="text-decoration: none; color: #0f1531;">
                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                        <div class="rotate-img">
                            <img src="{{ $article->image }}" alt="banner" class="img-fluid">
                        </div>
                        </div>
                        <div class="col-sm-8 grid-margin">
                        <h2 class="font-weight-600 mb-2">
                            {{ $article->title }}
                        </h2>
                        <p class="fs-13 text-muted mb-0">
                            {{ $article->created_at->diffForHumans(now())}}
                        </p>
                        <p class="fs-15">
                            {{ $article->short_description }}
                        </p>
                        </div>
                    </div>
                  </a>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection

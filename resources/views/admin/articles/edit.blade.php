@extends('layouts.admin')

@section('title', 'Create Article')

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
                <h3 class="card-title">New Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('articles.update', [$article->id]) }}" method="POST"
            enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Category Title</label>
                        <input type="text" name="title" value="{{ $article->title }}" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Category Name</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option>-- Select --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" selected="{{ $article->category_id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="short_description">{{ $article->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Full Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="full_description">{{ $article->full_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                            <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3" name="status" checked>
                            <label class="custom-control-label" for="customSwitch3">Activity Status</label>
                        </div>
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

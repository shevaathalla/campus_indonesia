@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header text-uppercase font-weight-bold">
                Create News
            </div>
            <div class="card-body">
                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        @csrf
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
                        <div class="col-md-6">
                            <textarea name="content" id="content" class="form-control  @error('content') is-invalid @enderror" autocomplete="content" required></textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Image</label>
                        <div class="col-md-6">
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus">

                                </i>
                                Create
                            </button>
                        </div>                        
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>    
@endsection
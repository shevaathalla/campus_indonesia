@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header text-uppercase font-weight-bold">
                Update Major
            </div>
            <div class="card-body">
                <form action="{{ route('major.update',['major'=>$major]) }}" method="post">
                    <div class="form-group row">
                        <label for="faculty" class="col-md-4 col-form-label text-md-right">Faculty</label>
                        <div class="col-md-6">
                            <select name="faculty" id="faculty" class="form-control">
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id }}" {{ ($faculty->id == $major->faculty->id) ? 'selected' : '' }}>{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        @csrf
                        @method('put')
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $major->name }}" required autocomplete="name" autofocus required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror" autocomplete="description" required>{{ $major->description }}</textarea>                            
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        @csrf
                        <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
                        <div class="col-md-6">
                            <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ $major->website}}" required autocomplete="website" autofocus required>
                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-4">
                            <button type="submit" class="btn btn-info font-weight-bold text-uppercase">
                                <i class="fa fa-pen">

                                </i>
                                Update
                            </button>
                        </div>                        
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>    
@endsection
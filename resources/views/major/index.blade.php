@extends('layouts.app')
@section('content')
@if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
<div class="row">
    <div class="col">
        <h2 class="font-weight-bold text-uppercase">
            MAJORS 
        </h2>        
    </div>
    @auth
    @if (auth()->user()->level == 'admin')
    <div class="col">
        <a href="{{ route('major.create') }}" class="btn btn-success float-right text-uppercase font-weight-bold"> <i class="fa fa-plus mr-2"></i> Create</a>
    </div>
    @endif    
    @endauth    
</div>
<hr>
@foreach ($majors as $major)
<div class="card shadow mb-4">
    <div class="card-header text-uppercase font-weight-bold">
        <div class="row">
            <div class="col">
                {{ $major->name }}
            </div>
            @auth
            @if (auth()->user()->level == 'admin')
            <div class="col">
                <a href="{{ route('major.edit',['major' => $major]) }}" class="btn btn-info float-right text-white font-weight-bold">
                    <i class="fa fa-edit"></i>
                    Edit
                </a>
                <form action="{{ route('major.destroy',['major' => $major]) }}" method="post" class="form-inline float-right">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-uppercase font-weight-bold mr-3" onclick="return confirm('are u sure?')">
                        <i class="fa fa-trash">

                        </i>
                        Delete
                    </button>
                </form>
            </div>
            @endif            
            @endauth            
        </div>        
    </div>
    <div class="card-body">
        {{ $major->description }}
    </div>
</div>
@endforeach
@endsection
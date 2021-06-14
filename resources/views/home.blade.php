@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <p>You are logged in! 
            @if (auth()->user()->level == 'admin')
                as an <b> ADMIN</b>
            @endif
        </p>
        </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header font-weight-bold text-uppercase">
            <div class="row">
                <div class="col">
                    {{ $news->title }}
                </div>
                <div class="col">
                    <div class="text-right">
                        Posted By: {{ $news->user->name }}
                    </div>
                </div>
            </div>            
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <img class="img-fluid" src="{{ asset('storage/image/'.$news->image) }}" alt="{{ $news->image }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="text-justify">
                        {{ $news->content }}
                    </div>                    
                </div>
            </div>            
        </div>
        <div class="card-footer">
            This article posted at
            <div class="text-black-50">
                {{ $news->created_at }}
            </div>
        </div>
    </div>
@endsection
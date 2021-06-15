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
                NEWS
            </h2>
        </div>
        @auth
            @if (auth()->user()->level == 'admin')
                <div class="col">
                    <a href="{{ route('news.create') }}" class="btn btn-success float-right text-uppercase font-weight-bold">
                        <i class="fa fa-plus mr-2"></i> Create</a>
                </div>
            @endif
        @endauth
    </div>
    <hr>
    @foreach ($news as $n)
        <div class="card shadow mb-4">
            <div class="card-header text-uppercase font-weight-bold">
                <div class="row">
                    <div class="col">
                        {{ $n->title }}
                    </div>
                    @auth
                        @if (auth()->user()->level == 'admin')
                            <div class="col">
                                <a href="{{ route('news.edit', ['news' => $n]) }}"
                                    class="btn btn-info float-right text-white font-weight-bold">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a>
                                <form action="{{ route('news.destroy', ['news' => $n]) }}" method="post"
                                    class="form-inline float-right">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger text-uppercase font-weight-bold mr-3"
                                        onclick="return confirm('are u sure?')">
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
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-thumbnail" src="{{ asset('storage/image/'.$n->image) }}" alt="{{ $n->image }}">
                    </div>
                    <div class="col">
                        {{ \Illuminate\Support\Str::limit($n->content, 500, '...') }}
                        <a href="{{ route('news.show',['news'=>$n]) }}" class="card-link"> Read More</a>
                    </div>
                </div>                
            </div>
            <div class="card-footer">
                This article posted at
                <div class="text-black-50">
                    {{ $n->created_at }}
                </div>
            </div>
        </div>
    @endforeach
@endsection

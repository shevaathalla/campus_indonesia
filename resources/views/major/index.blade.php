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
                    <a href="{{ route('major.create') }}" class="btn btn-success float-right text-uppercase font-weight-bold">
                        <i class="fa fa-plus mr-2"></i> Create</a>
                </div>
            @endif
        @endauth
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <table class="table" id="major_table">
                <thead>
                    <tr>
                        <th>Major Name</th>
                        <th>Faculty</th>
                        <th>Description</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>            
                <tbody>
                    @foreach ($majors as $major)
                    <tr>
                        <td>{{ $major->name }}</td>
                        <td>{{ $major->faculty->name }}</td>
                        <td>{{ $major->description }}</td>
                        <td> <a href=" {{ $major->website }}" class="btn-link"> {{ $major->website }}</a></td>
                        <td>
                            @auth
                                @if (auth()->user()->level == 'admin')
                                    <a href="{{ route('major.edit', ['major' => $major]) }}"
                                        class="btn btn-info text-white font-weight-bold text-uppercase">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('major.destroy', ['major' => $major]) }}" method="post"
                                        class="form-inline float-left">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger text-uppercase font-weight-bold mr-3"
                                            onclick="return confirm('are u sure?')">
                                            <i class="fa fa-trash">
    
                                            </i>
                                            Delete
                                        </button>
                                    </form>
                                @else
                                    Not Permitted
                                @endif
                            @endauth
                            @guest
                                Not Permitted
                            @endguest
                        </td>
                    </tr>
                @endforeach
                </tbody>            
            </table>
        </div>        
    </div>
@endsection
@section('script')
    <script>
        $(function() {            
            $('#major_table').DataTable();
        });
    </script>
@endsection

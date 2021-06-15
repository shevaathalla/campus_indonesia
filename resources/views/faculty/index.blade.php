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
                Faculties
            </h2>
        </div>
        @auth
            @if (auth()->user()->level == 'admin')
                <div class="col">
                    <a href="{{ route('faculty.create') }}" class="btn btn-success float-right text-uppercase font-weight-bold">
                        <i class="fa fa-plus mr-2"></i> Create</a>
                </div>
            @endif
        @endauth
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <table class="table" id="faculty_table">
                <thead>
                    <tr>
                        <th>Faculty Name</th>                        
                        <th>Description</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>            
                <tbody>
                    @foreach ($faculties as $faculty)
                    <tr>
                        <td>{{ $faculty->name }}</td>                        
                        <td>{{ $faculty->description }}</td>
                        <td> <a href=" {{ $faculty->website }}" class="btn btn-link"> {{ $faculty->website }}</a></td>
                        <td>
                            @auth
                                @if (auth()->user()->level == 'admin')
                                    <a href="{{ route('faculty.edit', ['faculty' => $faculty]) }}"
                                        class="btn btn-info text-white font-weight-bold text-uppercase">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </a>
                                    <a href="{{ route('faculty.show',['faculty'=>$faculty]) }}"
                                        class="btn btn-warning font-weight-bold text-uppercase ml-2">
                                        <i class="fa fa-info"></i>
                                        Info
                                    </a>
                                    <form action="{{ route('faculty.destroy', ['faculty' => $faculty]) }}" method="post"
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
            $('#faculty_table').DataTable();
        });
    </script>
@endsection

@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <div class="card">
                <div class="card-header d-flex row">
                    <h4 class="col-10">Game List</h4>
                    <a href="{{url('games/create')}}" class="btn btn-primary col-2">Add Game</a>
                </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($games as $game)
                                <tr>
                                    <td>{{$game->id}}</td>
                                    <td>{{$game->name}}</td>
                                    <td><img src="{{ asset('storage/' . $game->image) }}" width="50" alt="image can't load"></td>
                                    <td>{{$game->description}}</td>
                                    <td>
                                        <a href="{{route('games.show', $game->id)}}" class="btn btn-info">Show</a>
                                        <a href="{{route('games.edit', $game->id)}}" class="btn btn-success" >Edit</a>
                                       
                                        
                                        <form action="{{ route('games.destroy', $game->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form> 
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                            {{$games->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
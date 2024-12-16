@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

            @session('status')
                <div class="alert alert-success ">
                    {{session('status')}}
                </div>
            @endsession
                <div class="card">
                <div class="card-header d-flex row">
                    <h4 class="col-10">Categories List</h4>
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary col-2">Add Categories</a>
                </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->status==1? 'visible':'hidden'}}</td>
                                    <td>
                                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-success" >Edit</a>
                                        <a href="{{route('category.show', $category->id)}}" class="btn btn-info">Show</a>
                                        
                                        <form action="{{route('category.destroy', $category->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                            {{$all->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
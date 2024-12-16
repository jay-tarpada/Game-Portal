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
                    <h4 class="col-10">Products List</h4>
                    <a href="{{url('product/create')}}" class="btn btn-primary col-2">Add Product</a>
                </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td><img src="{{ asset('storage/' . $product->image)}}" width="50" alt="image can't load"></td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->status==1? 'visible':'hidden'}}</td>
                                    <td>
                                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-success" >Edit</a>
                                        <a href="{{route('product.show', $product->id)}}" class="btn btn-info">Show</a>
                                        
                                        <form action="{{route('product.destroy', $product->id)}}" method="post" class="d-inline">
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
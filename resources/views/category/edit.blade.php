@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                <div class="card-header d-flex row">
                    <h4 class="col-10">Edit Categories</h4>
                    <a href="{{url('admin/category')}}" class="btn btn-danger col-2">Back</a>
                </div>
                    <div class="card-body">
                       <form action="{{ route('category.update' , $category->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}"/>
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" rows="3" class="form-control" >{!! $category->description !!}</textarea>
                            @error('description')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" {{$category->status == 1? 'checked':''}}/>
                            @error('status')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
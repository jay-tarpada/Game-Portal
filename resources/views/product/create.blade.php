@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header d-flex row">
                        <h4 class="col-10">Create Product</h4>
                            <a href="{{url('product')}}" class="btn btn-danger col-2">Back</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @if(isset($product))
                                @method('PUT')
                            @endif --}}
                        
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"/>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                                @error('description')<span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')<span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            
                           
                        <div class="mb-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($cat_all as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="checkbox" name="status" checked/>
                                @error('status')<span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
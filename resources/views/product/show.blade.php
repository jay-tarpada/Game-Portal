@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                <div class="card-header d-flex row">
                    <h4 class="col-10">Product Details</h4>
                    <a href="{{url('product')}}" class="btn btn-danger col-2">Back</a>
                </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Id</label>
                            <p>{{$product->id}} </p>
                        </div>

                        <div class="mb-3">
                            <label>Category Id</label>
                            <p>{{$product->category_id}} </p>
                        </div>

                        <div class="mb-3">
                            <label>Name</label>
                            <p>{{$product->name}} </p>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <p>{!! $product->description !!}</p>
                        </div>

                        <div class="mb-3">
                            <label>Image</label></br>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <p>{{$product->status == 1? 'Active':'Hidden'}}</p>
                        </div>

                    
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
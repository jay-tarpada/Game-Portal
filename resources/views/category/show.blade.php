@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                <div class="card-header d-flex row">
                    <h4 class="col-10">Category Details</h4>
                    <a href="{{url('admin/category')}}" class="btn btn-danger col-2">Back</a>
                </div>
                    <div class="card-body">
                       
                        <div class="mb-3">
                            <label>Name</label>
                            <p>{{$category->name}} </p>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <p>{!! $category->description !!}</p>
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <p>{{$category->status == 1? 'checked':''}}</p>
                        </div>

                    
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header d-flex row">
                        <h4 class="col-10">Create Categories</h4>
                            <a href="{{url('admin/category')}}" class="btn btn-danger col-2">Back</a>
                    </div>

                    @if (!@empty($category))
                    {{html()->modelform($category,'PUT','admin.ctegory.'.$category['id'])->open()}}
                    @else
                        {{html()->form('POST','/admin/category')->open()}}
                    @endif

                    <div class="card-body">
                       {{-- <form action="{{url('admin/category')}}" method="post">
                        @csrf --}}
                        
                        <div class="mb-3">
                            <label>Name</label>
                            {{-- <input type="text" name="name" class="form-control"/> --}}
                            {{html()->input('text','name')->class(['form-control'=> true])->placeholder('Enter name')}}
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            {{-- <textarea name="description" rows="3" class="form-control"></textarea> --}}
                            {{html()->input('textarea','description')->class(['form-control'=> true])->placeholder('Enter description')}}
                            @error('description')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" checked/>
                            {{-- {{html()->input('checkbox', 'status')->class(['form-control' => true])->checked(true)}} --}}

                            @error('status')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                       {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
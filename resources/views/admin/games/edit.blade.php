@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header d-flex row">
                        <h4 class="col-10">Edit Game</h4>
                            <a href="{{url('games')}}" class="btn btn-danger col-2">Back</a>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- This will tell Laravel to treat the request as a PUT -->
                        
                            <div class="mb-3">
                                <label>Game Name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $game->name }}" />
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control">{{ $game->description }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Game Image:</label>
                                <input type="file" id="image" name="image" accept="image/*">
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>HTML Game File:</label>
                                <input type="file" id="html_file" name="html_file" accept=".html">
                                @error('html_file') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Update Game</button>
                            </div>
                        </form>
                        
                        
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
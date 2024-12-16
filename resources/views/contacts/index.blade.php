@extends('admin.layout.app')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header d-flex row">
                        <h4 class="col-10">Contact Messages</h4>
                    </div>
                    <div class="card-body">
<table>
    <thead>
        <tr>
            <th width="200px">Name</th>
            <th width="200px">Email</th>
            <th width="200px">Message</th>
            <th width="200px">Received At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->message }}</td>
                <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
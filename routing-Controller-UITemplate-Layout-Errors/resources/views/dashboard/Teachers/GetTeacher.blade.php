@extends('layout.dashboard')

@section('content')

<div class="row mt-3">
    <div class="col-3">
        <h2>All Teachers</h2>
    </div>
    <div class="col-9 d-flex justify-content-end">
        <a href="{{Url('/Teachers/Create')}}" class="btn btn-sm btn-primary me-3">Create New Record</a>
    </div>
</div>

<table class="table table-border">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Grade</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Image</th>
            <th>status</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($student as $st)
            <tr>
                <td>{{$st->id}}</td>
                <td>{{$st->name}}</td>
                <td>{{$st->grade}}</td>
                <td>{{$st->gender}}</td>
                <td>{{$st->email}}</td>
                <td>
                    <img src="{{$st->img}}" style="width: 50px;height:60px"/>
                </td>
                <td>
                    @if ($st->status == 1)
                        <span class="btn btn-sm btn-success">Active</span>
                        @else
                        <span class="btn btn-sm btn-danger">UnActive</span>
                    @endif
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Edit</a> | 
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
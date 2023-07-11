@extends('layout.dashboard')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

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
        @foreach ($student as $t)
            <tr>
                <td>{{$t->id}}</td>
                <td>{{$t->name}}</td>
                <td>{{$t->grade}}</td>
                <td>{{$t->gender}}</td>
                <td>{{$t->email}}</td>
                <td>
                    <img src="/{{$t->img}}" style="width: 50px;height:60px"/>
                </td>
                <td>
                    @if ($t->status == 1)
                        <span class="btn btn-sm btn-success">Active</span>
                        @else
                        <span class="btn btn-sm btn-danger">UnActive</span>
                    @endif
                </td>
                <td>
                    <a href="{{url('/Teachers/Edit')}}/{{$t->id}}" class="btn btn-sm btn-primary">Edit</a> | 
                    <a href="{{url('/Teachers/delete')}}/{{$t->id}}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    const notyf = new Notyf({
        duration: 1000,
        position: {
            x: 'right',
            y: 'top',
        },
        types: [
            {
                type: 'warning',
                background: 'orange',
                icon: {
                    className: 'material-icons',
                    tagName: 'i',
                    text: 'warning'
                },
                duration: 2000,
            },
            {
                type: 'error',
                background: 'indianred',
                duration: 2000,
                dismissible: true
            },
            {
                type: 'success',
                duration: 2000,
                dismissible: true
            }
        ]
    });

    
    // notyf.open({
    //     type: 'success',
    //     message: 'Data Updated Successfuly'
    // });
</script>

@if (Session::has('success'))
    {{-- <div class="alert alert-success">
        {{ Session::get('success') }}
    </div> --}}
    <script>
        notyf.open({
            type: 'success',
            message: '{{ Session::get('success')}}'
        });
    </script>
    @php
        Session::forget('success');
    @endphp
@endif

@endsection
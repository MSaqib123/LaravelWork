@extends('layout.dashboard')

@section('content')
    <div class="container">
        

        <div class="row mt-3">
            <div class="col-3">
                <h2>Students</h2>
            </div>
            <div class="col-9 d-flex justify-content-end">
                <a href="{{ url('/Dashboard/Student/create') }}" class="btn btn-sm btn-primary mb-3">Add Student</a>
            </div>
        </div>

        

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->class }}</td>
                        <td>
                            <span class="badge badge-pill {{ $student->active ? 'badge-success' : 'badge-danger' }}">
                                {{ $student->active ? 'Yes' : 'No' }}
                            </span>
                        </td>

                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

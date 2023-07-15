@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Edit Student</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST" id="edit-student-form" novalidate>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                <div class="invalid-feedback">
                    Please enter a valid name.
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <br>
                <label><input type="radio" name="gender" value="Male" required {{ old('gender', $student->gender) == 'Male' ? 'checked' : '' }}> Male</label>
                <label><input type="radio" name="gender" value="Female" required {{ old('gender', $student->gender) == 'Female' ? 'checked' : '' }}> Female</label>
                <div class="invalid-feedback">
                    Please select a gender.
                </div>
            </div>

            <div class="form-group">
                <label for="class">Class:</label>
                <select name="class" id="class" class="form-control" required>
                    <option value="">Select a class</option>
                    <option value="Class1" {{ old('class', $student->class) == 'Class1' ? 'selected' : '' }}>Class 1</option>
                    <option value="Class1" {{ old('class', $student->class) == 'Class2' ? 'selected' : '' }}>Class 2</option>
                    <option value="Class1" {{ old('class', $student->class) == 'Class3' ? 'selected' : '' }}>Class 3</option>
                    <option value="Class1" {{ old('class', $student->class) == 'Class4' ? 'selected' : '' }}>Class 4</option>
                </select>
                <div class="invalid-feedback">
                    Please select a class.
                </div>
            </div>
            <div class="form-group">
                <label for="active">Active:</label>
                <br>
                <label>
                    <input type="checkbox" name="active" value="1" {{ old('active', $student->active) == 1 ? 'checked' : '' }}>
                    Active
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>


    <script>
        // Custom client-side form validation using Bootstrap
        (function() {
            'use strict';

            // Select the form element
            var form = document.getElementById('edit-student-form');

            // Function to validate the form inputs
            function validateForm() {
                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var gender = form.querySelector('input[name="gender"]:checked');
                var selectedClass = document.getElementById('class').value;

                // Validate name
                if (name.trim() === '') {
                    document.getElementById('name').classList.add('is-invalid');
                    return false;
                }

                // Validate email
                if (email.trim() === '' || !validateEmail(email)) {
                    document.getElementById('email').classList.add('is-invalid');
                    return false;
                }

                // Validate gender
                if (!gender) {
                    var genderRadios = form.querySelectorAll('input[name="gender"]');
                    for (var i = 0; i < genderRadios.length; i++) {
                        genderRadios[i].classList.add('is-invalid');
                    }
                    return false;
                }

                // Validate class
                if (selectedClass === '') {
                    document.getElementById('class').classList.add('is-invalid');
                    return false;
                }

                // If all validation passes, return true
                return true;
            }

            // Function to remove validation classes and reset errors on input change
            function resetValidation() {
                var inputs = form.querySelectorAll('.is-invalid');
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].classList.remove('is-invalid');
                }
            }

            // Add submit event listener to the form
            form.addEventListener('submit', function(event) {
                // Prevent form submission if validation fails
                if (!validateForm()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                // Add validation classes and reset errors on input change
                else {
                    resetValidation();
                }

                // Add Bootstrap's was-validated class to display validation errors
                form.classList.add('was-validated');
            });

            // Helper function to validate email format
            function validateEmail(email) {
                var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(email);
            }
        })();
    </script>
@endsection

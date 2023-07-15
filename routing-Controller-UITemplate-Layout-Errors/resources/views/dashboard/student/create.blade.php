
@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Add Student (Db Query)</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST" id="create-student-form" novalidate>
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid name.
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <br>
                <label><input type="radio" name="gender" value="Male" required> Male</label>
                <label><input type="radio" name="gender" value="Female" required> Female</label>
                <div class="invalid-feedback">
                    Please select a gender.
                </div>
            </div>
            <div class="form-group">
                <label for="class">Class:</label>
                <select name="class" id="class" class="form-control" required>
                    <option value="">Select a class</option>
                    <option value="1">Class 1</option>
                    <option value="2">Class 2</option>
                    <option value="3">Class 3</option>
                    <option value="4">Class 4</option>
                </select>
                <div class="invalid-feedback">
                    Please select a class.
                </div>
            </div>
            <div class="form-group">
                <label for="active">Active:</label>
                <br>
                <label><input type="checkbox" name="active" value="1"> Active</label>
                <div class="invalid-feedback">
                    Please check the active checkbox.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

    <script>
        // Custom client-side form validation using Bootstrap
        (function() {
            'use strict';

            // Select the form element
            var form = document.getElementById('create-student-form');

            // Function to validate the form inputs
            function validateForm() {
                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var gender = form.querySelector('input[name="gender"]:checked');
                var selectedClass = document.getElementById('class').value;
                var activeCheckbox = document.querySelector('input[name="active"]:checked');

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

                // Validate active checkbox
                if (!activeCheckbox) {
                    var activeCheckboxes = form.querySelectorAll('input[name="active"]');
                    for (var j = 0; j < activeCheckboxes.length; j++) {
                        activeCheckboxes[j].classList.add('is-invalid');
                    }
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
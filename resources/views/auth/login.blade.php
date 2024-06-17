@extends('layouts.guestlogin')

@section('login')
    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        <div class="input-group input-group-outline mb-3">
            <input class="form-control" name="email" id="inputEmail" type="email" placeholder="Email" required />
            <label for="inputEmail"></label>
            <div class="invalid-feedback" id="emailError">Please enter a valid email address.</div>
        </div>

        <div class="input-group input-group-outline mb-3">
            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password"
                required />
            <label for="inputPassword"></label>
            <div class="invalid-feedback" id="passwordError">Password is required.</div>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" name="remember" id="inputRememberPassword" type="checkbox" value=""
                checked>
            <label class="form-check-label" for="inputRememberPassword">Remember me</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
        </div>
        <p class="mt-4 text-sm text-center">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Sign up</a>
        </p>
    </form>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            // Stop sending the form
            event.preventDefault();

            // Remove previous error messages
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            if (emailError) emailError.style.display = 'none';
            if (passwordError) passwordError.style.display = 'none';

            // Retrieve values from form input
            const email = document.getElementById('inputEmail').value;
            const password = document.getElementById('inputPassword').value;

            // Variable to hold validation status
            let isValid = true;

            // Email Validation (cannot be empty and must be valid)
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                if (emailError) emailError.style.display = 'block';
                isValid = false;
            }

            // Password Validation (cannot be empty)
            if (!password) {
                if (passwordError) passwordError.style.display = 'block';
                isValid = false;
            }

            // If there are no errors, the form can be submitted
            if (isValid) {
                event.target.submit();
            }
        });
    </script>
    <style>
        .invalid-feedback {
            color: red;
            display: none;
        }

        .invalid-feedback.show {
            display: block;
        }
    </style>
@endsection

@extends('layouts.guestlogin')

@section('login')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-floating mb-3">
            <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
            <label for="inputEmail">Email address</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
            <label for="inputPassword">Password</label>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" name="remember" id="inputRememberPassword" type="checkbox" value=""
                checked>
            <label class="form-check-label" for="inputRememberPassword">Remember me</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign
                in</button>
        </div>
        <p class="mt-4 text-sm text-center">
            Don't have an account?
            <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Sign up</a>
        </p>
    </form>
@endsection

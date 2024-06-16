@extends('layouts.guestlogin')

@section('login')
    <form role="form" class="text-start">
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control">
        </div>
        <div class="form-check form-switch d-flex align-items-center mb-3">
            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
            <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
        </div>
        <div class="text-center">
            <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign
                in</button>
        </div>
        <p class="mt-4 text-sm text-center">
            Don't have an account?
            <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Sign up</a>
        </p>
    </form>
@endsection

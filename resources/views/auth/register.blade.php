@extends('layouts.guestregister')

@section('register')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <form role="form">
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Last Name</label>
                <input type="email" class="form-control">
            </div>
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Email Address</label>
                <input type="password" class="form-control">
            </div>
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="form-check form-check-info text-start ps-0">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign
                    Up</button>
            </div>
        </form>
        @endsection

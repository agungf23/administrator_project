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
                <input class="form-control" id="inputFirstName" name="name" type="text" placeholder="first name"
                    value="{{ old('name') }}" />
                <label for="inputFirstName"></label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input class="form-control" id="inputLastName" name="name" type="text" placeholder="last name"
                    value="{{ old('name') }}" />
                <label for="inputLastName"></label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input class="form-control" id="inputEmail" name="email" type="email" placeholder="Your Email"
                    value="{{ old('email') }}" />
                <label for="inputEmail"></label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                <label for="inputPassword"></label>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input class="form-control" id="inputPassword" name="password_confirmation" type="password_confirmation"
                    placeholder="Confirm password"/>
                <label for="inputPasswordConfirm"></label>
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

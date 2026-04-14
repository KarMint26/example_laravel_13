@extends('layouts.app')
@section('subtitle', 'Register Account')
@section('style_custom')
    <link rel="stylesheet" href="{{ asset('mystyle/css/log-reg-style.css') }}">
@endsection

@section('content')
    <form class="form" action="{{ route('auth.register_p') }}" method="POST">
        @csrf
        <a href="{{ route('index') }}">
            <img src="{{ asset('mystyle/images/logo/logo-4-nobg.png') }}" alt="AeroLink Logo">
        </a>
        <p class="title">Register </p>
        <p class="message">Signup now and get full access to our app. </p>
        <label>

            <input required="true" placeholder="" name="name" type="text" class="input">
            <span>Name</span>
        </label>

        <label>
            <input required="true" placeholder="" name="email" type="email" class="input">
            <span>Email</span>
        </label>

        <label>
            <input required="true" placeholder="" name="password" type="password" class="input">
            <span>Password</span>
        </label>
        <label>
            <input required="true" placeholder="" name="password_confirmation" type="password" class="input">
            <span>Confirm password</span>
        </label>
        <button class="submit">Submit</button>
        <p class="signin">Already have an acount ? <a href="{{ route('auth.login_g') }}">Signin</a> </p>
    </form>
@endsection

@extends('layouts.app')
@section('subtitle', 'Login Account')
@section('style_custom')
    <link rel="stylesheet" href="{{ asset('mystyle/css/log-reg-style.css') }}">
@endsection

@section('content')
    <form class="form" action="{{ route('auth.login_p') }}" method="POST">
        @csrf
        <a href="{{ route('index') }}">
            <img src="{{ asset('mystyle/images/logo/logo-4-nobg.png') }}" alt="AeroLink Logo">
        </a>
        <p class="title">Welcome Back</p>
        <p class="message">Login to your account to continue.</p>

        <label>
            <input required="true" placeholder="" name="email" type="text" class="input">
            <span>Email</span>
        </label>

        <label>
            <input required="true" placeholder="" name="password" type="password" class="input">
            <span>Password</span>
        </label>

        <button class="submit">Login</button>
        <p class="signin">Don't have an account? <a href="{{ route('auth.register_g') }}">Register</a></p>
    </form>
@endsection

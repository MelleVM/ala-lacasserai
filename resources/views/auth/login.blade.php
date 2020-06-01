{{-- auth/login.blade.php --}}

{{-- gebruikt 'app' layout --}}
@extends('layouts.app')

{{-- content sectie --}}
@section('content')

<div class="container">
    <div class="auth-container">
        <div class="auth-wrapper">
            <form class="main-content" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="header">
                    <h1>La Casserai</h1>
                </div>
                <div class="l-part">
                    <input type="email" name="email" placeholder="Email" class="input-1" />
                    <div class="overlap-text">
                        <input type="password" name="password" placeholder="Password" class="input-2" />
                        <a href="{{ route('password.request') }}">Forgot?</a>
                    </div>
                    <button type="submit" type="button" class="btn-auth">Log in</button>
                </div>
            </form>
            <div class="sub-content">
                <div class="s-part">
                    Don't have an account?<a href="/register"> <br>Sign up</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

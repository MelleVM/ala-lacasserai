{{-- auth/register.blade.php --}}

{{-- gebruikt 'app' layout --}}
@extends('layouts.app')

{{-- content sectie --}}
@section('content')

<div class="container">
    <div class="auth-container">
        <div class="auth-wrapper register">
            <form class="main-content register" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="header">
                    <h1>La Casserai</h1>
                </div>
                <div class="part-1">
                    <input type="text" name="name" placeholder="Name" class="input-1" />
                    <input type="text" name="email" placeholder="Email" class="input-1" />
                    <input type="password" name="password" placeholder="Password" class="input-2" />
                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                        class="input-2" />
                </div>
                <div class="part-2">
                    <input type="text" name="address" placeholder="Address" class="input-1" />
                    <input type="text" name="residence" placeholder="Residence" class="input-1" />
                    <input type="text" name="postal_code" placeholder="Postal code" class="input-2" />
                </div>
                <button type="submit" class="btn-auth">Sign Up</button>

            </form>
        </div>
        <div class="sub-content">
            <div class="s-part">
                Already have an account?<a href="/login"> <br>Login</a>
            </div>
        </div>
        </FORM>
    </div>
</div>

@endsection

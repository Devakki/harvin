@extends('admin.layouts.app')


@section('content')
<section class="duke-surgery-login-modal-main">
    <div class="container">
        <div class="duke-logi-modal-main">
            <div class="text-center mt-4">
                <h1 class="duke-person-details-title">Welcome back, Admin</h1>
                <p class="duke-paragraph-list">
                    Sign in to your account to continue
                </p>
                @if (Session::get('error'))
                <span class="text-danger">{{ Session::get('error') }}</span>
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="m-sm-4">
                    
                        <div class="text-center">
                            <img src="{{ asset("images/green_places_logo01.svg") }}" alt="Green Places" class="img-fluid " width="132" height="132" />
                        </div>
                        <form class="m-t" method="POST" action="{{ url('admin/login') }}" id="loginForm">
                            @csrf

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="duke-paragraph-list">Email</label>
                                {{Form::text("email", null, ["class" => "form-control form-control-lg", "placeholder" => "Enter your email"])}}
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="duke-paragraph-list">Password</label>
                                {{Form::password("password", ["class" => "form-control form-control-lg", "placeholder" => "Enter your password"])}}
                                @if ($errors->has('password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="dukesurgery-themes-btns-main">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

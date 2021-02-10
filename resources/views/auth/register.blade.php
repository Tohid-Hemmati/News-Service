@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<body class="text-center" data-new-gr-c-s-check-loaded="14.993.0" data-gr-ext-installed="">--}}
{{--<main class="form-signin">--}}
{{--    <form method="POST" action="{{ route('register') }}">--}}
{{--        <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">--}}
{{--        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>--}}
{{--        <label for="inputEmail" class="visually-hidden">Email address</label>--}}
{{--        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">--}}
{{--        <label for="inputPassword" class="visually-hidden">Password</label>--}}
{{--        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">--}}
{{--        <div class="checkbox mb-3">--}}
{{--            <label>--}}
{{--                <input type="checkbox" value="remember-me"> Remember me--}}
{{--            </label>--}}
{{--        </div>--}}
{{--        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>--}}
{{--        <p class="mt-5 mb-3 text-muted">© 2017-2021</p>--}}
{{--    </form>--}}
{{--</main>--}}





{{--</body>--}}

@endsection









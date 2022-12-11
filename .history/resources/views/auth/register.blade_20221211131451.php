@extends('layouts.auth')

@section('content')

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <center>
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">{{ __('Register') }}</span>
                            </a>
                        </center>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Welcome to PHPTestDemo! 👋</h4>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>

                    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Enter your name" autofocus />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Enter your email" autofocus />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">{{ __('Password') }}</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control  @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">{{ __('Confirm Password') }}</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password-confirm"
                                    class="form-control  @error('password') is-invalid @enderror"
                                    name="password_confirmation" required autocomplete="current-password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="new-password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Register in</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="{{ route('login') }}">
                            <span>Sign in instead</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

@endsection
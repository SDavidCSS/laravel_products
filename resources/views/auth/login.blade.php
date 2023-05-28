@extends('login-layout')

@section('content')
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="{{ asset('images/vermont_logo.png') }}"
                                         style="width: 185px;" alt="logo">
                                </div>

                                @error('validation')
                                    <div class="login-error mb-3 p-2 text-white" style="background-color: #dc3545">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <form method="POST" action="{{ route('auth.authenticate') }}">

                                    @csrf

                                    <div class="welcome text-center">
                                        <p>{{ __('messages.login_welcome') }}</p>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />

                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="password">{{ __('messages.password') }}</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" />

                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check mb-4">
                                        <input type="checkbox" name="rememberMe" id="rememberMe" class="form-check-input" value="1" />
                                        <label class="form-check-label fw-bold" for="rememberMe">Remember me</label>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">{{ __('messages.login') }}</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

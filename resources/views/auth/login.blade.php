@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">{{ __('Student Login') }}</h5>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3 form-floating">
                            <input id="email" type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                        <div class="mb-3 form-floating">
                            <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="password">{{ __('Password') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                            <div class="col-12 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                
                            </div>
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link small text-muted text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Need Help?') }}
                                    </a>
                                @endif
                            <a href="{{ route('register')}}" class="btn btn-link small text-dark text-decoration-none float-right">Create an Account?</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

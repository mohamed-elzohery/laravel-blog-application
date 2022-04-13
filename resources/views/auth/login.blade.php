@extends('layout.layout')
@section('title')login
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card flex justify-center items-center">
                <h2 class="card-header text-center text-4xl">{{ __('Login') }}</h2>

                <div class="card-body  flex justify-center items-center">
                    <form class="flex flex-col max-w-md items-center" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-6">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email" autofocus>

                            </div>
                        </div>
                        
                        <div class="row mb-6">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            
                            <div class="col-md-6">
                                <input placeholder="password" id="password" type="password" class="form-control input  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

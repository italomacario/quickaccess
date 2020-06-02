@extends('layouts.app')

@section('content')
<div class="container login-form">

        <form class="text-center border border p-5" action="{{ route('login') }}" method="POST">
            @csrf
        
            <p class="h4 mb-4">Login</p>
        

            <input value="{{ old('email') }}" required autocomplete="email" autofocus type="email" name="email" class="form-control mb-4 @error('email') is-invalid @enderror" placeholder="E-mail">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="password" name="password" class="form-control mb-4 @error('password') is-invalid @enderror" placeholder="Senha" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="d-flex justify-content-around float-left pb-3">
                <div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Lembrar-me</label>
                    </div>
                </div>
            </div>
        

            <button class="btn btn-info btn-block my-4" type="submit">Login</button>
        
            <div>
                <div class="float-left">
                    <a href="{{ route('password.request') }}">Esqueceu a Senha? <i class="fas fa-unlock-alt"></i></a>
                </div>
                <div class="float-right">
                    <a href="{{ route('register')}}">Cadastre-se <i class="fas fa-sign-in-alt"></i></a>
                </div>
            </div>
        
        </form>
</div>
@endsection

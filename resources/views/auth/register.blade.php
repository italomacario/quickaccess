@extends('layouts.app')

@section('content')
<div class="container login-form pb3-3">

    <form class="text-center border border p-5" action="{{ route('register') }}" method="post">
        @csrf

        <p class="h4 mb-4">Cadastre-se</p>


        <input type="text" name="name" class="form-control mb-4  @error('name') is-invalid @enderror" placeholder="Nome">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror


        <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4 @error('email') is-invalid @enderror" placeholder="E-mail">


        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror


        <input type="password" name="password" class="form-control mb-4 @error('password') is-invalid @enderror" placeholder="Senha">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input type="password" name="password_confirmation" class="form-control mb-4" placeholder="Confirme a Senha">

        <div class="d-flex justify-content-around float-left pb-3">
            <div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Concordo com os <a
                            href="#">termos de uso</a></label>
                </div>
            </div>
        </div>


        <button class="btn btn-info btn-block my-4" type="submit">Cadastrar</button>


    </form>

</div>

@endsection
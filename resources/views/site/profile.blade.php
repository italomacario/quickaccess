@extends('layouts.app')

@section('title', 'Perfil - QuickAccess')

@section('content')


<div class="container">
    <div class="row">
        <div class="col mb-3">
            <div class="card" style="background: #C8C8C8;">
                <div class="card-body">
                    <div class="e-profile">
                        <div class="row">
                            <div class="col-12 col-sm-auto mb-3">
                                <div class="mx-auto" style="width: 140px;">
                                    <div class="justify-content-center align-items-center">
                                        <img src="{{asset('storage/user/'.Auth::user()->image)}}" class="imageprofile rounded">
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{Auth::user()->name}}</h4>
                                    <div class="mt-2">
                                    </div>
                                </div>

                                <div class="text-center text-sm-right">
                                    <span class="badge badge-secondary">{{Auth::user()->accesslevel}}</span>
                                    <div class="text-muted"><small>Registrado em {{Auth::user()->created_at}}</small></div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="" class="active nav-link">Dados Pessoais</a></li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane active">
                                <form class="form" action="{{ route('alter.profile') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif


                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Foto de Perfil</label>
                                                        <input type="file" class="form-control-file"
                                                            id="avatar" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nome Completo</label>
                                                        <input class="form-control" type="text" name="name"
                                                            placeholder="Nome Completo" value="{{Auth::user()->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" type="text" name="email"
                                                            placeholder="Email" value="{{Auth::user()->email}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="mb-2"><b>Alterar Senha</b></div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Senha Atual</label>
                                                        <input class="form-control" type="password" name="password"
                                                            placeholder="••••••">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nova Senha</label>
                                                        <input class="form-control" type="password" name="newpassword"
                                                            placeholder="••••••">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Confirmar Nova Senha<span
                                                                class="d-none d-xl-inline">Password</span></label>
                                                        <input class="form-control" type="password" name="confirmnewpassword"
                                                            placeholder="••••••"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
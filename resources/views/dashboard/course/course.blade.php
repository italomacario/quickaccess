@extends('dashboard.template.nav')
@section('title', 'QuickAccess - Cadastrar Cursos')
@section('content')


<div class="container-fluid">
    <h1>Cadastrar Curso</h1>
    <form method="POST" action="{{ route('course.register') }}" enctype="multipart/form-data">
        @csrf

        @if(session('errors'))
        @foreach ($errors as $error)
        <div class="alert alert-danger">
            <li> {{$error}} </li>
        </div>
        @endforeach
        @endif

        <div class="form-group">
            <label for="NameCourse">Nome Do Curso</label>
            <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="NameCourse" placeholder="Nome Do Curso">
        </div>
        <div class="form-group">
            <label for="coursevideo">Link do Video no Youtube ( https://www.youtube.com/embed/keiA8e3naqc )</label>
            <input value="{{ old('video') }}" type="text" name="video" class="form-control" id="coursevideo" placeholder="https://www.youtube.com/embed/keiA8e3naqc">
        </div>
        <div class="form-group">
            <label for="HourCertificate">Total Horas Certificado</label>
            <input value="{{ old('hourcertificate') }}" type="text" name="hourcertificate" class="form-control" id="HourCertificate" placeholder="Total Horas Certificado">
        </div>

        <div class="form-group">
            <span>Instrutor do Curso</span>
            <select name="instructor" class="custom-select">
                <option value="">Qual o Instrutor do Curso?</option>
                @foreach($users as $user)
                    
                    @if($user->id == old('Instrutor'))
                    <option selected value="{{$user->id}}">{{$user->name}}</option>
                    @continue
                    @endif
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="status">Status Curso</label>
            <div class="form-check" id="status">
                @if( old('status') == 'Completo')
                <input class="form-check-input" type="radio" name="status" id="completo" value="Completo" checked>
                @else
                <input class="form-check-input" type="radio" name="status" id="completo" value="Completo">
                @endif
                <label class="form-check-label" for="completo">
                    Completo
                </label>
            </div>
            <div class="form-check">
                @if(old('status') == 'Incompleto')
                <input class="form-check-input" type="radio" name="status" id="Incompleto" value="Incompleto" checked>
                @else
                <input class="form-check-input" type="radio" name="status" id="Incompleto" value="Incompleto">
                @endif
                <label class="form-check-label" for="incompleto">
                    Incompleto
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="Textarea">Descrição do Curso</label>
            <textarea name="description" class="form-control" id="Textarea" rows="3" placeholder="Descrição do Curso">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label>Imagem do Curso</label>
            <input type="file" name="photo" class="form-control-file">
        </div>

        <button class="btn btn-success" type="submit">Cadastrar Curso</button>
    </form>
</div>


<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header bg-danger">
                <p class="heading lead">Excluir Curso</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-times fa-4x mb-3"></i>
                    <p>CERTEZA QUE DESEJA APAGAR ESTE CURSO?</p>
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-left">
                <a type="button" class="btn btn-success" data-dismiss="modal">Cancelar</a>
                <a type="button" class="btn btn-danger">Apagar</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

@endsection
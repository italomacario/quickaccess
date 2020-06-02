@extends('dashboard.template.nav')
@section('title', 'QuickAccess - Alterar Curso')
@section('content')


<div class="container-fluid">
    <h1>Alterar Curso {{ $course->name }}</h1>
    <form method="POST" action="{{ route('course.alter.do', $course->id) }}" enctype="multipart/form-data">
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
            <input value="{{ old('name') ? old('name') : $course->name }}" type="text" name="name" class="form-control" id="NameCourse" placeholder="Nome Do Curso">
        </div>
        <div class="form-group">
            <label for="coursevideo">Link do Video no Youtube ( https://www.youtube.com/embed/keiA8e3naqc )</label>
            <input value="{{ old('video') ? old('video') : $course->video }}" type="text" name="video" class="form-control" id="coursevideo" placeholder="https://www.youtube.com/embed/keiA8e3naqc">
        </div>
        <div class="form-group">
            <label for="HourCertificate">Total Horas Certificado</label>
            <input value="{{ old('hourcertificate') ? old('hourcertificate') : $course->hourcertificate }}" type="text" name="hourcertificate" class="form-control" id="HourCertificate" placeholder="Total Horas Certificado">
        </div>

        <div class="form-group">
            <span>Instrutor do Curso</span>
            <select name="instructor" class="custom-select">
                <option value="">Qual o Instrutor do Curso?</option>
                @foreach($users as $user)
                    
                    @if($user->id == $course->id)
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
                @if($course->status == 'Completo')
                <input class="form-check-input" type="radio" name="status" id="completo" value="Completo" checked>
                @else
                <input class="form-check-input" type="radio" name="status" id="completo" value="Completo">
                @endif
                <label class="form-check-label" for="completo">
                    Completo
                </label>
            </div>
            <div class="form-check">
                @if($course->status == 'Incompleto')
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
            <textarea name="description" class="form-control" id="Textarea" rows="3" placeholder="Descrição do Curso">{{ old('description') ? old('description') : $course->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="photo">Imagem do Curso</label>
            <input type="file" name="photo" class="form-control-file">
        </div>

        <button class="btn btn-success" type="submit">Alterar Curso</button>
    </form>
</div>

@endsection
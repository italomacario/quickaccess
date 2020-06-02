@extends('dashboard.template.nav')
@section('title', 'QuickAccess - Cadastrar Aula')
@section('content')


<div class="container-fluid">
  <h1>Cadastrar Aula do Modulo {{ $module->name }}</h1>
  <form method="POST" action="{{ route('lesson.register', $module->id) }}" enctype="multipart/form-data">
    @csrf

    @if(session('errors'))
    @foreach ($errors as $error)
    <div class="alert alert-danger">
      <li> {{$error}} </li>
    </div>
    @endforeach
    @endif
    <div class="form-group">
      <label for="Namelesson">Nome Da Aula</label>
      <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="Namelesson" placeholder="Nome Da Aula">
    </div>
    <div class="form-group">
      <label for="lesson">Link do Video no Youtube ( https://www.youtube.com/embed/keiA8e3naqc )</label>
      <input value="{{ old('lesson') }}" type="text" name="lesson" class="form-control" id="lesson" placeholder="https://www.youtube.com/embed/keiA8e3naqc">
    </div>
    <div class="form-group">
      <label for="Textarea">Descrição do Aula</label>
      <textarea name="description" class="form-control" id="Textarea" rows="3" placeholder="Descrição da Aula">{{ old('description') }}</textarea>
    </div>
    <button class="btn btn-success" type="submit">Cadastrar Aula</button>
  </form>
</div>

@endsection
@extends('dashboard.template.nav')
@section('title', 'QuickAccess - Alterar Modulos')
@section('content')


<div class="container-fluid">
  <h1>Alterar Modulo{{ $module->name }}</h1>
  <form method="POST" action="{{ route('module.alter.do', $module->id) }}" enctype="multipart/form-data">
    @csrf
    @if(session('errors'))
    @foreach ($errors as $error)
    <div class="alert alert-danger">
      <li> {{$error}} </li>
    </div>
    @endforeach
    @endif
    <div class="form-group">
      <label for="NameModule">Nome Do Modulo</label>
      <input type="text" name="name" value="{{ old('name') ? old('name') : $module->name }}" class="form-control" id="NameModule" placeholder="Nome Do Modulo">
    </div>
    <div class="form-group">
      <label for="Textarea">Descrição do Modulo</label>
      <textarea name="description" class="form-control" id="Textarea" rows="3" placeholder="Descrição do Modulo">{{ old('description') ? old('description') : $module->description }}</textarea>
    </div>
    <button class="btn btn-success" type="submit">Alterar Modulo</button>
  </form>
</div>

@endsection
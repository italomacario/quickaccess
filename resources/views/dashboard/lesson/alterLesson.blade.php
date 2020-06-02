@extends('dashboard.template.nav')
@section('title', 'QuickAccess - Alterar Aula')
@section('content')


    <div class="container-fluid">
        <h1>Alterar Aula {{ $lesson->name }}</h1>
      <form method="POST" action="{{ route('lesson.alter.do', $lesson->id) }}" enctype="multipart/form-data">
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
            <input type="text" name="name" class="form-control" id="Namelesson" placeholder="Nome Da Aula" value="{{ $lesson->name }}">
          </div>
          <div class="form-group">
            <label for="lessonvideo">Link do Video no Youtube ( https://www.youtube.com/embed/keiA8e3naqc )</label>
            <input type="text" name="lesson" class="form-control" id="lessonvideo" placeholder="https://www.youtube.com/embed/keiA8e3naqc" value="{{ $lesson->lesson }}">
          </div>
          <div class="form-group">
            <label for="Textarea">Descrição da Aula</label>
            <textarea name="description" class="form-control" id="Textarea" rows="3" placeholder="Descrição da Aula">{{ $lesson->description }}</textarea>
          </div>

        <button class="btn btn-success" type="submit">Alterar Aula</button>
      </form>
    </div>

@endsection
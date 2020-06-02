@extends('layouts.app')

@section('title', 'QuickAccess - '. $lesson->name)
@section('content')

<div class="container">
<div class="row">

    <div class="col-lg-9 p-4">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="text-center row">
                        <div class="col-lg-3">     
                            <img src="{{asset('storage/course/'.$course->image)}}" 
                            alt="" class="img-instructor rounded-circle">    
                        </div>
                        <div class="col-lg-9">
                            <h1>Aula: {{$lesson->name}}</h1>
                            <span>{{$lesson->description}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <iframe class="videopresentation"
                        src="{{$lesson->lesson}}"
                        allowfullscreen="allowfullscreen">
                    </iframe>
                </div>
            </div>
    </div>

    <div class="col-lg-3 margin">
        
        <div id="sidebar-container" class="sidebar-expanded d-md-block mt-3">
            <ul class="list-group">

                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>MODULOS</small>
                </li>
                @foreach($course->modules as $module)
                <a href="#{{ str_replace(' ','', $module->name) }}" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="menu-collapsed">{{ $module->name }}</span>
                    </div>
                </a>
                <div id="{{ str_replace(' ','', $module->name) }}" class="collapse sidebar-submenu">
                    @foreach($module->lessons as $lesson)
                    <a href="{{ route('lesson.view', [$course->id, $lesson->id]) }}" class="list-group-item list-group-item-action bg-dark text-white lessonitem">
                        <span class="menu-collapsed">{{ $lesson->name }}</span>
                    </a>
                    @endforeach
                </div>
                @endforeach
            </ul>
        </div>
        
        <div class="card">
            <div class="card-body">
                <i class="fas fa-calendar-alt"></i> Publicado Em: {{$course->created_at}}
            </div>
            <div class="card-body">
            <i class="far fa-clock"></i> Total de Horas Certificado: {{ $course->hourcertificate }}
            </div>
            <div class="card-body">
            <i class="fas fa-signal"></i> Status: {{ $course->status }}
            </div>
        </div>
    </div>
</div>

</div>

    
@endsection

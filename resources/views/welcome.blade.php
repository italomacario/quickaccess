@extends('layouts.app')

@section('title', 'QuickAccess - Desenvolva habilidades com cursos')

@section('content')

<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay" style="background-image: url('{{ asset('storage/image/background.jpg') }}')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>QuickAccess - Cursos Online</h1>
                    <p class="mb-5">
                        Avance na sua carreira. Persiga sua paixão. Continue aprendendo. Desenvolva habilidades com cursos e certificados tudo online com os melhores professores do mundo.</p>
                    <form action="{{ route('courses') }}">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" name="search" placeholder="Qual Curso Você Deseja?">
                            <button type="submit" class="btn btn-info text-white px-4">Pesquisar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center">
        @foreach($courses as $course)

        <div class="col-sm-4 col-md-3 col-lg-3 col-6">
            <a href="{{ route('courseOne', $course->id) }}">
                <div class="card_course">
                    <div class="card_image">
                        <img src="{{asset('storage/course/'.$course->image)}}" />
                    </div>
                    <div class="card_title title">
                        <p class="title-text">{{$course->name}}</p>
                    </div>
                </div>
            </a>
        </div>

        @endforeach
    </div>
</div>
@endsection
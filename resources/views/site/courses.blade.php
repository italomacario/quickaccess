@extends('layouts.app')

@section('title', 'Cursos - QuickAccess')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-3">
            <nav class="sidebar">
				<div>
                    <h3>Filtrar Cursos</h3>
                    <ul class="list-unstyled components">
                        <li class="mb-2">
                            <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Nivel</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu1">
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Iniciante</a></li>
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Intermediário</a></li>
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Avançado</a></li>
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Especialista</a></li>
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Todos</a></li>
                            </ul>
                        </li>
                        <li class="mb-2">
                            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tipo</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu2">
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Gratuitos</a></li>
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Todos</a></li>
                            </ul>
                        </li>
                        <li class="mb-2">
                            <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categorias</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu3">
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Categoria1</a></li>
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Categoria2</a></li>
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Categoria3</a></li>
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Categoria4</a></li>
                            <li><a href="#"><span class="fa fa-chevron-right m-2"></span> Categoria5</a></li>
                            </ul>
                        </li>
                        <li class="mb-2">
                            <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Professores</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu4">
                            @foreach($users as $user)
                            <li><a href="#"><span class="m-2"></span>{{$user->name}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
    	    </nav>
        </div>

        
        <div class="col-9">
            <h2>Lançamentos</h2>
                <div class="row">
                @foreach($courses as $course)

                    <div class="col-lg-4 col-md-12">
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
    </div>



</div>
@endsection

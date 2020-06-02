@extends('layouts.app')

@section('title', 'Meus Cursos - QuickAccess')

@section('content')
<div class="container">
<h1></>MEUS CURSOS</></h1>
    <div class="row">
        @foreach($courses as $course)

        <div class="col-4">
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
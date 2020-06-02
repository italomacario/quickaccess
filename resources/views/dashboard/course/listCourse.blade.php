@extends('dashboard.template.nav')
@section('title', 'QuickAccess - Lista de Cursos')
@section('content')

<div class="container-fluid">
    <h1>Lista de Cursos</h1>
</div>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('errors'))
@foreach ($errors as $error)
<div class="alert alert-danger">
    <li> {{$error}} </li>
</div>
@endforeach
@endif
<div class="row">
    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
        <div class="table-responsive">
            <table id="dtBasicExample" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="th-sm">Id
                        </th>
                        <th class="th-sm">Imagem
                        </th>
                        <th class="th-sm">Nome do Curso
                        </th>
                        <th class="th-sm">Status
                        </th>
                        <th class="th-sm">Horas do Certificado
                        </th>
                        <th class="th-sm">Adicionar Modulos
                        </th>
                        <th class="th-sm">Listar Modulos
                        </th>
                        <th class="th-sm">Alterar Curso
                        </th>
                        <th class="th-sm">Deletar Curso
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td><img class="courseimg" src="{{asset('storage/course/'.$course->image)}}"></td>
                        <td>{{$course->name}}</td>
                        <td>{{$course->status}}</td>
                        <td>{{$course->hourcertificate}} Horas</td>
                        <td><a href="{{ route('module', $course->id) }}" class="btn btn-success">Adicionar Modulos</a>
                        </td>
                        <td>
                            <a href="{{ route('module.list', $course->id) }}" class="btn btn-success">Listar Modulos</a>
                        </td>
                        <td><a href="{{ route('course.alter', $course->id) }}" class="btn btn-success">Alterar Curso</a>
                        </td>
                        <td>
                            <a href="{{ route('course.delete', $course->id) }}" id="url" class="btn btn-danger" data-toggle="modal" onclick="DeleteModal()" data-target="#deletarModal">Deletar
                                Curso</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="th-sm">Id
                        </th>
                        <th class="th-sm">Imagem
                        </th>
                        <th class="th-sm">Nome do Curso
                        </th>
                        <th class="th-sm">Status
                        </th>
                        <th class="th-sm">Horas do Certificado
                        </th>
                        <th class="th-sm">Adicionar Modulos
                        </th>
                        <th class="th-sm">Listar Modulos
                        </th>
                        <th class="th-sm">Alterar Curso
                        </th>
                        <th class="th-sm">Deletar Curso
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="deletarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Deletar Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja deletar esse Curso? Todos os Modulos/Aulas Vinculadas também vai ser Deletados
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                <form action="#" id="modalDelete" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Deletar Curso</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
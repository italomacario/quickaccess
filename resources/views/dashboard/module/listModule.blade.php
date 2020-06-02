@extends('dashboard.template.nav')
@section('title', 'QuickAccess - Listar Modulos')
@section('content')

<div class="container-fluid">
<h1>Lista de Modulos do Curso</h1>

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
      <table class="table table-striped table-bordered text-center">
        <thead>
          <tr>
            <th class="th-sm">Id
            </th>
            <th class="th-sm">Curso
            </th>
            <th class="th-sm">Modulo
            </th>
            <th class="th-sm">Descrição
            </th>
            <th class="th-sm">Adicionar Aula
            </th>
            <th class="th-sm">Listar Aulas
            </th>
            <th class="th-sm">Alterar Modulo
            </th>
            <th class="th-sm">
            </th>
          </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
          <tr>
            <td>{{$module->id}}</td>
            <td>{{$module->course->name}}</td>
            <td>{{$module->name}}</td>
            <td>{{$module->description}}</td>
            </td>
            <td>
              <a href="{{ route('lesson.register', $module->id)}}" class="btn btn-success">Adicionar Aulas</a>
            </td>
            <td>
              <a href="{{ route('lesson.list', $module->id)}}" class="btn btn-success">Listar Aulas</a>
            </td>
            <td><a href="{{ route('module.alter', $module->id) }}" class="btn btn-success">Alterar Modulo</a>
            <td>
              <a href="{{ route('module.delete', ['idmodule' => $module->id, 'idcourse' => $module->course->id]) }}" id="url" class="btn btn-danger" onclick="DeleteModal()" data-toggle="modal" data-target="#deletarModal">Deletar Curso</a>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th class="th-sm">Id
            </th>
            <th class="th-sm">Curso
            </th>
            <th class="th-sm">Modulo
            </th>
            <th class="th-sm">Descrição
            </th>
            <th class="th-sm">Adicionar Aula
            </th>
            <th class="th-sm">Listar Aulas
            </th>
            <th class="th-sm">Alterar Modulo
            </th>
            <th class="th-sm">
            </th>
          </tr>
        </tfoot>
      </table>
    </div>
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
        <p>Tem certeza que deseja deletar esse Modulo? Todas as Aulas Vinculadas também vai ser Deletados</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        <form action="#" id="modalDelete" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger" >Deletar Modulo</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
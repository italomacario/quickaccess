@extends('dashboard.template.nav')
@section('title', 'QuickAccess - Listar Aulas')
@section('content')

<div class="container-fluid">
  <h1>Lista de Aulas</h1>


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
              <th class="th-sm">Nome da Aula
              </th>
              <th class="th-sm">Descrição Do Aula
              </th>
              <th class="th-sm">Link da Aula
              </th>
              <th class="th-sm">Alterar Aula
              </th>
              <th class="th-sm">Deletar Aula
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($lessons as $lesson)
            <tr>
              <td>{{ $lesson->id }}</td>
              <td>{{ $lesson->name }}</td>
              <td>{{ $lesson->description }}</td>
              <td>{{ $lesson->lesson }} </td>
              <td><a href="{{ route('lesson.alter', $lesson->id) }}" class="btn btn-success">Alterar Aula</a></td>
              <td>
                <a href="{{ route('lesson.delete', ['idlesson' => $lesson->id, 'idmodule' => $lesson->module->id]) }}" id="url" class="btn btn-danger" onclick="DeleteModal()" data-toggle="modal" data-target="#deletarModal">Deletar Curso</a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th class="th-sm">Id
              </th>
              <th class="th-sm">Nome da Aula
              </th>
              <th class="th-sm">Descrição Do Aula
              </th>
              <th class="th-sm">Link da Aula
              </th>
              <th class="th-sm">Alterar Aula
              </th>
              <th class="th-sm">Deletar Aula
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
        <p>Tem certeza que deseja deletar esse Aula?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        <form action="#" id="modalDelete" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Deletar Aula</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
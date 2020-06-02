@extends('dashboard.template.nav')
@section('title', 'QuickAccess - Listar Usuarios')
@section('content')

<div class="container-fluid">
  <h1>Lista de Usuarios</h1>

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
              <th class="th-sm">Usuario
              </th>
              <th class="th-sm">Email
              </th>
              <th class="th-sm">Nivel
              </th>
              <th class="th-sm">Criado
              </th>
              <th class="th-sm">Alterado
              </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->accesslevel}}</td>
              <td>{{$user->created_at}}</td>
              <td>{{$user->updated_at}}</td>
              <td><a href="{{ route('user.alter', $user->id) }}" id="url" class="btn btn-danger" onclick="alterModal()" data-toggle="modal" data-target="#modalAlter">Nivel</a></td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th class="th-sm">Id
              </th>
              <th class="th-sm">Usuario
              </th>
              <th class="th-sm">Email
              </th>
              <th class="th-sm">Nivel
              </th>
              <th class="th-sm">Criado
              </th>
              <th class="th-sm">Alterado
              </th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal" id="modalAlter" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Alterar Nivel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="#" id="modalAlterUser" method="post">
        @csrf
        <div class="modal-body">
          <p>Tem Certeza que Deseja Alterar este Usuario?</p>
          <div class="form-group">
            <label for="accesslevel">Nivel</label>
            <select class="form-control" id="accesslevel" name="accesslevel">
              <option value="non-subscriber">Não Assinante</option>
              <option value="Assinante">Assinante</option>
              <option value="Instrutor">Instrutor</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Alterar Usuario</button>
      </form>
    </div>
  </div>
</div>
</div>

@endsection
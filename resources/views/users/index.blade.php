@extends('layouts.sigfi')

@section('content')
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de Usuarios</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Correo Electrónico</th>
                      <th>Estado</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        @if( $user->active == 1 )
                          Activo
                        @else
                          Inactivo
                        @endif
                      </td>
                      <td><a href="{{ URL::to('users/' . $user->id . '/edit') }}">Editar</a></td>
                      <td><a href="{{ URL::to('users/asignRole/' . $user->id ) }}">Roles</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $users->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection

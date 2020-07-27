@extends('layouts.sigfi')

@section('content')
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de Proveedores</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" >
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      <a class="btn btn-sm btn-primary" href="{{ URL::to('proveedors/create') }}">Crear Proveedor</a>
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
                      <th>Estado</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($proveedors as $proveedor)
                    <tr>
                      <td>{{ $proveedor->name }}</td>
                      <td>{{ $proveedor->email }}</td>
                      <td>
                        @if( $proveedor->active == 1 )
                          Activo
                        @else
                          Inactivo
                        @endif
                      </td>
                      <td><a href="{{ URL::to('proveedor/' . $user->id . '/edit') }}">Editar</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $proveedors->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection


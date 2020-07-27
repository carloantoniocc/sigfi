@extends('layouts.sigfi')

@section('content')
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de Categorias</h3>

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
                      <th>Estado</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                      <td>{{ $categoria->name }}</td>
                      <td>{{ $categoria->estado }}</td>
                      <td>
                        @if( $categoria->active == 1 )
                          Activo
                        @else
                          Inactivo
                        @endif
                      </td>
                      <td><a href="{{ URL::to('categoria/' . $producto->id . '/edit') }}">Editar</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $categorias->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection
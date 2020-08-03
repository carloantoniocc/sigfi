@extends('layouts.sigfi')

@section('content')
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Compras</h3>

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
                      <th>id</th>
                      <th>Producto</th>
                      <th>monto</th>
                      <th>Formato</th>
                      <th>Fecha</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($compras as $compra)
                    <tr>
                      <td>{{ $compra->id }}</td>
                      <td>{{ $compra->producto->name }}</td>
                      <td >${{ $compra->monto }}.</td>
                      <td>{{ $compra->cantidad }} &nbsp; {{ $compra->medida->name }} </td>
                      <td>{{ $compra->created_at }}</td>
                      <td><a href="{{ URL::to('compras/' . $compra->id . '/edit') }}">Editar</a></td>
                      <td><a href="{{ URL::to('compras/' . $compra->id ) }}">Eliminar</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $compras->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

@endsection
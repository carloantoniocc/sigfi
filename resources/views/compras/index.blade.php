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
                      <th>Producto</th>
                      <th>monto</th>
                      <th>cantidad</th>
                      <th>editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($compras as $compra)
                    <tr>
                      <td>{{ $compra->id }}</td>
                      <td>{{ $compra->monto }}</td>
                      <td>{{ $compra->cantidad }}</td>
                      <td><a href="{{ URL::to('productos/' . $compra->id . '/edit') }}">Editar</a></td>
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
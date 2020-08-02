@extends('layouts.sigfi')

@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-8">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Nueva Compra</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/compras') }}">
                {{ csrf_field() }}                
                <div class="card-body">


                  <div class="form-group{{ $errors->has('producto_id') ? ' has-error' : '' }}">
                      <label for="provider_id" class="col-md-4 control-label">Producto</label>

                      <div class="col-md-6">
                          <select id="jsonprovider_id" class="form-control" name="jsonprovider_id" required>
                            <option value="">Seleccione Producto</option>
                            @foreach($productos as $producto)
                              <option value="{{ $producto->id }}">{{ $producto->name }}</option>
                            @endforeach
                          </select>
                      </div>
                  </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Crear</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>  
      </div>
    </section>  
@endsection
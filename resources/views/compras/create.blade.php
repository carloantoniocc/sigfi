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


                  <div class="form-group row{{ $errors->has('producto_id') ? ' has-error' : '' }}">
                      <label for="provider_id"  class="col-sm-2 col-form-label">Producto</label>

                      <div class="col-sm-10">
                          <select id="producto_id" class="form-control" name="producto_id" required>
                            <option value="">Seleccione Producto</option>
                            @foreach($productos as $producto)
                              <option value="{{ $producto->id }}">{{ $producto->name }}</option>
                            @endforeach
                          </select>
                      </div>
                  </div>

                  <div class="form-group row{{ $errors->has('monto') ? ' has-error' : '' }}">
                      <label for="monto" class="col-sm-2 col-form-label">Monto </label>

                      <div class="col-sm-6">
                          <input id="monto" type="text" class="form-control" name="monto" required autofocus>

                          @if ($errors->has('monto'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('monto') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>


                  <div class="form-group row{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                      <label for="cantidad" class="col-sm-2 col-form-label">Cantidad </label>

                      <div class="col-sm-3">
                          <input id="monto" type="text" class="form-control" name="cantidad" required autofocus>

                          @if ($errors->has('cantidad'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('cantidad') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>



                  <div class="form-group row{{ $errors->has('medida_id') ? ' has-error' : '' }}">
                      <label for="medida_id"  class="col-sm-2 col-form-label">Medida</label>

                      <div class="col-sm-6">
                          <select id="medida_id" class="form-control" name="medida_id" >
                            <option value="">Seleccione Medida</option>
                            @foreach($medidas as $medida)
                              <option value="{{ $medida->id }}">{{ $medida->name }}</option>
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
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
                <h3 class="card-title">Revision de Compra</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="formularioeliminacion" method="POST" action="{{ URL::to('compras/' . $compra->id) }}">
                <input type="hidden" name="_method" value="Delete">
                {{ csrf_field() }}                
                <div class="card-body">



                  <!--Campo productos-->
                  <div class="form-group row">
                    <label for="producto_id" class="col-sm-2 col-form-label">Producto</label>

                      <div class="col-sm-10">
                        <input id="producto" type="text" class="form-control" name="monto" value="{{$compra->producto->name}}" disabled="true" autofocus>
                      </div>
                  </div>  

                  <!--Campo productos-->
                  <div class="form-group row">
                    <label for="producto_id" class="col-sm-2 col-form-label">Medida</label>

                      <div class="col-sm-10">
                        <input id="medida" type="text" class="form-control" name="monto" value="{{$compra->medida->name}}" disabled="true" autofocus>
                      </div>
                  </div>



                  <div class="form-group row">
                      <label for="monto" class="col-sm-2 col-form-label">Monto </label>

                      <div class="col-sm-6">
                          <input id="monto" type="text" class="form-control" name="monto" value="{{$compra->monto}}" disabled="true" autofocus>
                      </div>
                  </div>


                  <div class="form-group row">
                      <label for="cantidad" class="col-sm-2 col-form-label">Cantidad </label>

                      <div class="col-sm-3">
                          <input id="monto" type="text" class="form-control" name="cantidad" value="{{$compra->cantidad}}" disabled="true" autofocus>

                          @if ($errors->has('cantidad'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('cantidad') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>


                  <div class="form-group row">
                    <label for="active" class="col-sm-2 col-form-label">Activo</label>

                      <div class="col-sm-10">
                        <select id="active" class="form-control" name="active" disabled="true" required>
                        @if ($compra->producto->active == 1)
                          <option value="1" selected>Si</option>
                          <option value="0">No</option>
                        @else
                          <option value="1">Si</option>
                          <option value="0" selected>No</option>    
                        @endif
                        </select>
                      </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger float-right">Eliminar</button>
                </div>
              </form>

               <script type="text/javascript">
                 (function() {
                   var form = document.getElementById('formularioeliminacion');
                   form.addEventListener('submit', function(event) {
                     // si es false entonces que no haga el submit
                     if (!confirm('Realmente desea eliminar?')) {
                       event.preventDefault();
                     }
                   }, false);
                 })();
               </script>

            </div>
            <!-- /.card -->
          </div>
        </div>  
      </div>
    </section>  
@endsection
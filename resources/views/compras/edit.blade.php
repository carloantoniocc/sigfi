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
                <h3 class="card-title">Editar Compra</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ URL::to('compras/' . $compra->id) }}">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}                
                <div class="card-body">

                  <!--Campo productos-->
                  <div class="form-group row{{ $errors->has('producto_id') ? ' has-error' : '' }}">
                    <label for="producto_id" class="col-sm-2 col-form-label">Producto</label>

                      <div class="col-sm-10">
                            <select id="producto_id" class="form-control" name="producto_id" required>
                              @foreach($productos as $producto)
                                  @if ($producto->id == $compra->producto_id)
                                      <option value="{{ $producto->id }}" selected="">{{ $producto->name }}</option>
                                  @else
                                      <option value="{{ $producto->id }}">{{ $producto->name }}</option>   
                                  @endif    
                              @endforeach        
                            </select> 
                      </div>
                  </div>  

                  <!--Campo productos-->
                  <div class="form-group row{{ $errors->has('medida_id') ? ' has-error' : '' }}">
                    <label for="medida_id" class="col-sm-2 col-form-label">Medida</label>

                      <div class="col-sm-10">
                            <select id="medida_id" class="form-control" name="medida_id" required>
                              @foreach($medidas as $medida)
                                  @if ($medida->id == $compra->medida_id)
                                      <option value="{{ $medida->id }}" selected="">{{ $medida->name }}</option>
                                  @else
                                      <option value="{{ $medida->id }}">{{ $medida->name }}</option>   
                                  @endif    
                              @endforeach        
                            </select> 
                      </div>
                  </div> 

                  <div class="form-group row{{ $errors->has('monto') ? ' has-error' : '' }}">
                      <label for="monto" class="col-sm-2 col-form-label">Monto </label>

                      <div class="col-sm-6">
                          <input id="monto" type="text" class="form-control" name="monto" value="{{$compra->monto}}" required autofocus>

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
                          <input id="monto" type="text" class="form-control" name="cantidad" value="{{$compra->cantidad}}" required autofocus>

                          @if ($errors->has('cantidad'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('cantidad') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>


                  <div class="form-group row{{ $errors->has('active') ? ' has-error' : '' }}">
                    <label for="active" class="col-sm-2 col-form-label">Activo</label>

                      <div class="col-sm-10">
                        <select id="active" class="form-control" name="active" required>
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
                  <button type="submit" class="btn btn-primary float-right">Modificar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>  
      </div>
    </section>  
@endsection
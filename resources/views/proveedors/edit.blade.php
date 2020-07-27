@extends('layouts.sigfi')

@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Editar Proveedor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ URL::to('proveedors/' . $proveedor->id) }}">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}                
                <div class="card-body">
                  
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" placeholder="Ingrese nombre" name="name" value="{{$proveedor->name}}" required>

                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                    <label for="active">Activo</label>

                      <div class="col-md-6">
                        <select id="active" class="form-control" name="active" required>
                        @if ($proveedor->active == 1)
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
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>  
      </div>
    </section>  
@endsection
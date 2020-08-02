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
                <h3 class="card-title">Crear Producto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/productos') }}">
                {{ csrf_field() }}                
                <div class="card-body">
                  <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" placeholder="Ingrese nombre" name="name" value="{{ old('name') }}" required>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group row {{ $errors->has('active') ? ' has-error' : '' }}">
                    <label for="active" class="col-sm-2 col-form-label">Activo</label>

                      <div class="col-md-6">
                        <select id="active" class="form-control" name="active" required>
                          <option value="1">Si</option>
                          <option value="0">No</option>
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
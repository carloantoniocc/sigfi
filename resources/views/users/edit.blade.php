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
                <h3 class="card-title">Editar Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ URL::to('users/' . $user->id) }}">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}                
                <div class="card-body">
                  <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Ingrese nombre" name="name" value="{{$user->name}}" required>

                          @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                    </div>    

                  </div>

                  <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Ingrese Email" name="email" value="{{$user->email}}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group row{{ $errors->has('active') ? ' has-error' : '' }}">
                    <label for="active" class="col-sm-2 col-form-label">Activo</label>

                      <div class="col-md-6">
                        <select id="active" class="form-control" name="active" required>
                        @if ($user->active == 1)
                          <option value="1" selected>Si</option>
                          <option value="0">No</option>
                        @else
                          <option value="1">Si</option>
                          <option value="0" selected>No</option>    
                        @endif
                        </select>
                      </div>
                  </div>

                  <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese Password">
                       
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif  
                    </div>                      
                  </div>

                  <div class="form-group row{{ $errors->has('cpassword') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-2 col-form-label">Confirmar</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirmar Password">
                       
                        @if ($errors->has('cpassword'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cpassword') }}</strong>
                            </span>
                        @endif                    
                    </div>    
                  </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Editar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>  
      </div>
    </section>  
@endsection
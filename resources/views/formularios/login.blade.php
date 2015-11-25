@extends ('layouts.default')
@section ('title') Registrarme
@stop

@section ('content')
<h1> Hola {{ $mensaje }} </h1>
<div class="col-md-4 center-block quitar espacio3 text-center margen">
              {!! Form::open(['url'=>'login']) !!}
              <div class="login-form">
                <div class="form-group">
                  {!! Form::text('txtnuser', null,array('placeholder' => 'Nombre de usuario', 'class' => 'form-control','autofocus')) !!}
                  @if( $errors->has('txtnuser') )
                  @foreach($errors->get('txtnuser') as $error )
                   <div class="alert alert-warning alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                       Ingrese su usuario
                    </div>
                  @endforeach
                  @endif
                </div>
                <div class="form-group">
                  {!! Form::password('txtpassword', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
                  @if( $errors->has('txtpassword') )
                  @foreach($errors->get('txtpassword') as $error )
                  <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                       La contraseña debe contener almenos 8 digitos
                    </div>
                  @endforeach
                  @endif
                </div>
                <div>
                  <div class="btn-group">
                    {!! Form::submit('Iniciar sesión',array('class'=>'btn btn-default boton'))!!}
                  </div>
                </div>
                </div>
                {!! Form::close() !!}
          </div>
@stop

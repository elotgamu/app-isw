@extends ('/welcome')
@section ('title') Registrarme @stop

@section ('content')
<div class="col-md-4 center-block quitar espacio3 text-center margen">
        <div class="container">
            <div class="row">
              {!! Form::open(['url'=>'home']) !!}
                <div class="form-group">
                <div>
                  {!! Form::text('txtnuser', null,array('placeholder' => 'Nombre de usuario', 'class' => 'form-control','autofocus')) !!}
                  @if( $errors->has('txtnuser') )
                  @foreach($errors->get('txtnuser') as $error )
                   <div class="alert alert-warning">
                       Ingrese su usuario
                    </div>
                  @endforeach
                  @endif
                </div>
                <div>
                  {!! Form::text('txtpassword', null,array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
                  @if( $errors->has('txtpassword') )
                  @foreach($errors->get('txtpassword') as $error )
                   <div class="alert alert-warning">
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
          </div>
      </div>
@stop

@extends ('/layouts.default')
@section ('title') Registrarme @stop

@section ('content')
<div class="col-md-4 center-block quitar espacio3 text-center margen">
  <div  class="panel panel-primary" >
    <div class="panel-heading">
    <h3 class="panel-title">Informacion del negocio</h3>
    </div>
  <div class="panel-body">
  {!! Form::open(['url'=>'registro']) !!}
         <div class="login-form">
           <div class="form-group">
             {!! Form::label('negocio','Nombre:', array('class'=> 'label')) !!}
             {!! Form::text('nombre', null,array('placeholder' => 'EJ: comedor la Ceibita', 'class' => 'form-control')) !!}
              @if($errors->has('nombre'))
              @foreach($errors->get('nombre') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{$error}}
                </div>
              @endforeach
              @endif
          </div>
            <div class="form-group">
            {!! Form::label('descripcion','Descripcion:',array('class'=> 'label')) !!}
            {!!Form::textarea('descripcion',null,array('class' => 'form-control')) !!}
          </div>
            <div class="form-group">
              {!! Form::label('ubicacion','Direccion:',array('class'=> 'label')) !!}
              {!! Form::text('direccion',null,array('class' => 'form-control')) !!}
              @if( $errors->has('direccion') )
              @foreach($errors->get('direccion') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                   {{$error}}
                </div>
              @endforeach
              @endif
            </div>
              <div class="form-group">
              {!! Form::label('Telefono','Telefono',array('class'=> 'label')) !!}
              {!! Form::text('telefono',null,array('pattern'=>'[0-9]{8}','id'=>'txttelefono','class' => 'form-control')) !!}
              <!--@if( $errors->has('telefono'))
              @foreach($errors->get('telefono') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{$error}}
                </div>
              @endforeach
              @endif-->
            </div>
          </div>
        </div>
      </div>

      <div  class="panel panel-primary" >
        <div class="panel-heading">
        <h3 class="panel-title">Informacion del usuario</h3>
        </div>
      <div class="panel-body">
              <div class="form-group">
              {!! Form::label('propietario','Propietario',array('class'=> 'label')) !!}
              {!! Form::text('propietario',null,array('placeholder' => 'EJ: Juan Lopez','class' => 'form-control')) !!}
              @if( $errors->has('propietario') )
              @foreach($errors->get('propietario') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                   {{$error}}
                </div>
              @endforeach
              @endif
            </div>

            <div class="form-group">
              {!! Form::label('email','Correo electronico',array('class'=> 'label')) !!}
              {!! Form::email('correo', null,array('placeholder' => 'EJ: juanlopez@ejemplo.com', 'class' => 'form-control')) !!}
              @if( $errors->has('correo') )
              @foreach($errors->get('correo') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 {{$error}}
                </div>
              @endforeach
              @endif
            </div>

            <div class="form-group">
              {!! Form::label('user','Nombre de usuario',array('class'=> 'label')) !!}
              {!! Form::text('usuario',null,array('placeholder' => 'EJ: Jlopez','class' => 'form-control')) !!}
              @if( $errors->has('usuario') )
              @foreach($errors->get('usuario') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                   {{$error}}
                </div>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              {!! Form::label('pass','Contraseña',array('class'=> 'label')) !!}
              {!! Form::password('contraseña', array('placeholder' => 'EJ: PaSsW0rD','class' => 'form-control')) !!}
              @if( $errors->has('contraseña') )
              @foreach($errors->get('contraseña') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{$error}}
                </div>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              <div class="btn-group">
                {!! Form::submit('Registrar',array('class'=>'btn btn-default boton'))!!}
              </div>
            </div>
        </div>
  {!! Form::close() !!}
  </div>
</div>
</div>
@stop

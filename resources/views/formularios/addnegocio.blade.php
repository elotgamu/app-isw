@extends ('/layouts.default')
@section ('title') Registrarme @stop

@section ('content')
<div class="col-md-4 center-block quitar espacio3 text-center margen">
  <div  class="contenedor_registro" >
  {!! Form::open(['url'=>'registro']) !!}
  <div class="row">
  </div>
     {!! Form::label('titulo','Datos del negocio', array('id'=>'div_registro','class'=> 'titulos')) !!}
         <div class="login-form">
           <div class="form-group">
             {!! Form::label('negocio','Nombre:', array('class'=> 'label')) !!}
             {!! Form::text('nombre', null,array('placeholder' => 'EJ: comedor la Ceivita', 'class' => 'form-control')) !!}
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
              {!! Form::label('email','Dirección de correo electronico',array('class'=> 'label')) !!}
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
            
            {!! Form::label('titulo','Datos de usuario', array('id'=>'div_registro','class'=> 'titulos')) !!}
            
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
              {!! Form::text('contraseña',null,array('placeholder' => 'EJ: 1234','class' => 'form-control')) !!}
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
@stop

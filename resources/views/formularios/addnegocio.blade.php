@extends ('/welcome')
@section ('title') Registrarme @stop

@section ('content')
<div class="col-md-4 center-block quitar espacio3 text-center margen">
  <div  class="contenedor_registro" >
  {!! Form::open(['url'=>'registro']) !!}
  <div class="row">
    {!! Form::label('titulo','Formulario de Registro', array('id'=>'div_registro','class'=> 'titulos')) !!}
  </div>
         <div class="login-form">
           <div class="form-group">
             {!! Form::label('negocio','Nombre del Negocio:', array('class'=> 'label')) !!}
             {!! Form::text('txtnegocio', null,array('placeholder' => 'EJ: comedor la Ceivita', 'class' => 'form-control')) !!}
              @if( $errors->has('txtnegocio') )
              @foreach($errors->get('txtnegocio') as $error )
               <div class="errores">
                   Ingrese el nombre del negocio
                </div>
              @endforeach
              @endif
          </div>
            <div class="form-group">
            {!! Form::label('descripcion','Descripcion del negocio:',array('class'=> 'label')) !!}
            {!!Form::textarea('txtdescripcion',null,array('class' => 'form-control')) !!}
          </div>
            <div class="form-group">
              {!! Form::label('ubicacion','Direccion del negocio',array('class'=> 'label')) !!}
              {!! Form::text('txtdireccion',null,array('class' => 'form-control')) !!}
              @if( $errors->has('txtdireccion') )
              @foreach($errors->get('txtdireccion') as $error )
               <div class="errores">
                   Especifique donde esta Ubicado el negocio
                </div>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              {!! Form::label('email','Dirección de correo electronico',array('class'=> 'label')) !!}
              {!! Form::email('email', null,array('placeholder' => 'EJ: juanlopez@ejemplo.com', 'class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::label('propietario','Nombre del propietario',array('class'=> 'label')) !!}
              {!! Form::text('txtpropietario',null,array('placeholder' => 'EJ: Juan Lopez','class' => 'form-control')) !!}
              @if( $errors->has('txtpropietario') )
              @foreach($errors->get('txtpropietario') as $error )
               <div class="errores">
                   Agregue el propietario o gerente del negocio
                </div>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              {!! Form::label('Telefono','Telefono del propietario',array('class'=> 'label')) !!}
              {!! Form::text('txttelefono',null,array('pattern'=>'[0-9]{8}','id'=>'txttelefono','class' => 'form-control')) !!}
              @if( $errors->has('txttelefono') )
              @foreach($errors->get('txttelefono') as $error )
               <div class="errores">
                   Agregue el numero telefonico del propietario o gerente
                </div>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              {!! Form::label('user','Nombre de usuario',array('class'=> 'label')) !!}
              {!! Form::text('txtuser',null,array('placeholder' => 'EJ: Jlopez','class' => 'form-control')) !!}
              @if( $errors->has('txtuser') )
              @foreach($errors->get('txtuser') as $error )
               <div class="errores">
                   Agrege un nombre de usuario
                </div>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              {!! Form::label('pass','Contraseña',array('class'=> 'label')) !!}
              {!! Form::text('txtpass',null,array('placeholder' => 'EJ: 1234','class' => 'form-control')) !!}
              @if( $errors->has('txtpass') )
              @foreach($errors->get('txtpass') as $error )
               <div class="errores">
                   especifique la contraseña
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
@strop

@extends ('/layouts.default')
@section ('title') Registrarme @stop

@section ('content')
<div class="col-md-4 center-block quitar espacio3 text-center margen">
  <div  class="panel panel-primary" >
    <div class="panel-heading">
    <h3 class="panel-title">Datos personales</h3>
    </div>
  <div class="panel-body">
  {!! Form::open(['url'=>'registro/cliente']) !!}
    <!--  {!! csrf_field() !!} -->
          <div class="login-form">
            <div class="form-group">
              {!! Form::label('nombre','Nombres:',array('class'=> 'label')) !!}
               {!! Form::text('txtnombres',null,array('placeholder' => 'EJ: Roberto Carlos','class' => 'form-control')) !!}
               @if($errors->has('txtnombres'))
              @foreach($errors->get('txtnombres') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{$error}}
                </div>
              @endforeach
              @endif
            </div>
             <div class="form-group">
              {!! Form::label('apellido','Apellidos:',array('class'=> 'label')) !!}
               {!! Form::text('txtapellidos',null,array('placeholder' => 'EJ: López Solís','class' => 'form-control')) !!}
                @if($errors->has('txtapellidos'))
              @foreach($errors->get('txtapellidos') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{$error}}
                </div>
              @endforeach
              @endif
            </div>
             <div class="form-group">
              {!! Form::label('direccion','Dirección:',array('class'=> 'label')) !!}
               {!! Form::text('txtdireccion',null,array('class' => 'form-control')) !!}
               @if($errors->has('txtdireccion'))
              @foreach($errors->get('txtdireccion') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{$error}}
                </div>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              {!! Form::label('email','Correo electrónico:',array('class'=> 'label')) !!}
               {!! Form::email('txtemail', null,array('placeholder' => 'EJ: juanlopez@ejemplo.com', 'class' => 'form-control')) !!}
              @if($errors->has('txtemail'))
              @foreach($errors->get('txtemail') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{$error}}
                </div>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              {!! Form::label('Telefono','Teléfono:',array('class'=> 'label')) !!}
              {!! Form::text('txttelefono',null,array('placeholder'=>'88884444', 'pattern'=>'[0-9]{8}','id'=>'txttelefono','class' => 'form-control')) !!}
              @if($errors->has('txttelefono'))
              @foreach($errors->get('txttelefono') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{$error}}
                </div>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              {!! Form::label('user','Nombre de usuario:',array('class'=> 'label')) !!}
              {!! Form::text('txtuser',null,array('placeholder' => 'EJ: Jlopez','class' => 'form-control')) !!}
              @if($errors->has('txtuser'))
              @foreach($errors->get('txtuser') as $error )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {{$error}}
                </div>
              @endforeach
              @endif
            </div>
            <div class="form-group">
              {!! Form::label('pass','Contraseña:',array('class'=> 'label')) !!}
              {!! Form::password('txtpass', array('class' => 'form-control')) !!}
              @if($errors->has('txtpass'))
              @foreach($errors->get('txtpass') as $error )
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

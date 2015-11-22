
@extends ('/welcome')
@section ('title') Principal
@stop

@section ('content')
<div class="lp7-container">
  <div class="landing-page-container">
    <div class="banner-container">
      <div class="container">
        <div class="topbar-row clearfix">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <div class="row">
            <br>
            </div>
            <div  class="row">
            <div class="form-horizontal">
              <div class="form-group">
              <div class="col-xs-4">
                {!! Form::text('txtnuser', null,array('placeholder' => 'Nombre de usuario', 'class' => 'form-control','autofocus')) !!}
              </div>
              <div class="col-xs-4">
                {!! Form::text('txtpassword', null,array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
              </div>
              <div class="col-xs-2">
                <div class="btn-group">
              {!! Form::submit('Iniciar sesión',array('class'=>'btn btn-default boton'))!!}
                </div>
              </div>
              </div>
              <!--<div class="form-group">
              <div class="col-xs-10">
                {!! Form::text('txtpassword', null,array('class' => 'form-control')) !!}
              </div>-->
              </div>
            </div>
            </div>
           </div>

            </div>
            <div class="container">
              <div class="col-md-4 center-block quitar espacio3 text-center margen">
                     <div class="contenedor_info_landing">
                       <div class="login-form">
                        <div class="form-group">
                         <div class="btn-group">
                             {!! Form::submit('Me gustaria unirme',array('id'=>'btnregistro','class'=>'btn btn-default boton'))!!}
                         </div>
                       </div>
                       </div>
                      </div>
              </div>
                 </div>
               </div>
            </div>
          </div>

<section class="opacidad">
<div class="col-md-4 center-block quitar espacio3 text-center margen">
  <div  class="contenedor_registro" >
  {!! Form::open() !!}
  <div class="row">
    {!! Form::label('titulo','Formulario de Registro', array('id'=>'div_registro','class'=> 'titulos')) !!}
  </div>
         <div class="login-form">
           <div class="form-group">
             {!! Form::label('negocio','Nombre del Negocio:', array('class'=> 'label')) !!}
              <!--<div class="col-xs-9">-->
             {!! Form::text('txtnegocio', null,array('placeholder' => 'EJ: comedor la Ceivita', 'class' => 'form-control')) !!}
              <!--</div>-->
          </div>
            <div class="form-group">
            {!! Form::label('descripcion','Descripcion del negocio:',array('class'=> 'label')) !!}
            {!!Form::textarea('txtdescripcion',null,array('class' => 'form-control')) !!}
          </div>
            <div class="form-group">
              {!! Form::label('ubicacion','Direccion del negocio',array('class'=> 'label')) !!}
              {!! Form::text('txtdireccion',null,array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::label('email','Dirección de correo electronico',array('class'=> 'label')) !!}
              {!! Form::email('email', null,array('placeholder' => 'EJ: juanlopez@ejemplo.com', 'class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::label('propietario','Nombre del propietario',array('class'=> 'label')) !!}
              {!! Form::text('txtpropietario',null,array('placeholder' => 'EJ: Juan Lopez','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::label('Telefono','Telefono del propietario',array('class'=> 'label')) !!}
              {!! Form::tel('txttelefono',null,array('pattern'=>'[0-9]{8}','id'=>'txttelefono','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::label('user','Nombre de usuario',array('class'=> 'label')) !!}
              {!! Form::text('txtuser',null,array('placeholder' => 'EJ: Jlopez','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              {!! Form::label('pass','Contraseña',array('class'=> 'label')) !!}
              {!! Form::text('txtpass',null,array('placeholder' => 'EJ: 1234','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              <div class="btn-group">
            {!! Form::submit('Registrar',array('class'=>'btn btn-default boton'))!!}
              </div>
            </div>
            <!--{!! Form::label('descripcion','Descripcion del negocio') !!}
            {!! Form::text('txtdescripcion',null,array('class' => 'form-control')) !!}
            {!! Form::label('ubicacion','Direccion del negocio') !!}
            {!! Form::text('txtdireccion',null,array('class' => 'form-control')) !!}
            {!! Form::label('email','Dirección de correo electronico') !!}
            {!! Form::text('email', null,array('placeholder' => 'EJ: juanlopez@ejemplo.com', 'class' => 'form-control')) !!}
            {!! Form::label('propietario','Nombre del propietario') !!}
            {!! Form::text('txtpropietario',null,array('placeholder' => 'EJ: Juan Lopez','class' => 'form-control')) !!}
            {!! Form::label('Telefono','Telefono del propietario') !!}
            {!! Form::text('txttelefono',null,array('placeholder' => 'EJ: 505-77825484','class' => 'form-control')) !!}
            {!! Form::label('user','Nombre de usuario') !!}
            {!! Form::text('txtuser',null,array('placeholder' => 'EJ: Jlopez','class' => 'form-control')) !!}
            {!! Form::label('pass','Contraseña') !!}
            {!! Form::text('txtpass',null,array('placeholder' => 'EJ: 1234','class' => 'form-control')) !!}-->
        </div>
  {!! Form::close() !!}
</div>
</div>
</section>
@stop

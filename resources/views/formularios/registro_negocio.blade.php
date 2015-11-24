
@extends ('layouts.default')
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
@stop

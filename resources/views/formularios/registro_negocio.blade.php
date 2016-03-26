@extends ('layouts.default')
@section ('title') Principal
@stop

@section ('content')
<div class="lp7-container">
  <div class="landing-page-container">
    <div class="banner-container">
      <div class="container">
        <!--<div class="topbar-row clearfix">
          <div class="col-sm-7"></div>
          <div class="col-sm-5">
          </div>
        </div>-->
          <div class="col-md-4 center-block quitar espacio3 text-center margen">
              <div class="contenedor_info_landing">
                  @if(Session::has('mensaje'))
                  <div class="alert alert-info alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('mensaje') }}
                    </div>
                   @endif
              <div class="row">
                     <div class="login-form">
                      <div class="form-group">
                       <div class="btn-group">
                         <p>
                            <a href="{{ action("addnegocioController@create") }}" class="btn btn-primary">Unete a la plataforma</a>
                          </p>
                          <p>
                             <a href="{{ action("loginController@create") }}" class="btn btn-primary">Iniciar Sesión</a>
                           </p>
                       </div>
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

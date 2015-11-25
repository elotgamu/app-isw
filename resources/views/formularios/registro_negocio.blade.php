@extends ('/welcome')
@section ('title') Principal
@stop

@section ('content')
<!--lp7-container-->
<div>
  <div class="landing-page-container">
    <div class="banner-container">
      <div class="container">
        <div class="topbar-row clearfix">
          <div class="col-sm-7"></div>
          <div class="col-sm-5">
          </div>
          </div>
          <div class="col-md-4 center-block quitar espacio3 text-center margen">
              <div class="row">
                   <div class="contenedor_info_landing">
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

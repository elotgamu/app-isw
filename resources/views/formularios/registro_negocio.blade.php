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
                            <a href="{{ action("addnegocioController@create") }}" class="btn btn-primary">Registra tu negocio</a>
                          </p>
                          <p>
                            <a href="{{ action("addclienteController@create") }}" class="btn btn-primary">Únete a la plataforma</a>
                          </p>
                          <!-- <p>
                             <a href="{{ action("loginController@create") }}" class="btn btn-primary">Iniciar Sesión</a>
                         </p> -->
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

<div class="container marketing">
 <div class="row">
  <div class="col-lg-4">
    <img class="img-circle" src="../images/ConectaImage.png" alt="Generic placeholder image" width="140" height="140"/>
    <h2>Conecta</h2>
    <p>Vive de la experiencia de tener tu negocio en linea, rompe las brechas entre tu negocio y clientes cercanos para de llegar a potenciales nuevos clientes de diferentes zonas de Nicaragua.</p>

<!-- Boton Modal -->
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Descubre como</button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<p>Build great app experiences for PCs, mobile, and more
The Universal Windows Platform (UWP) lets you create a single app package
that can be installed onto a wide range of devices—and the Windows Store
provides a unified distribution channel to reach customers worldwide.<br>
For developers, Windows 10 translates into 2x the engagement and 4x the revenue per user compared to Windows 8.
Access this marketplace on the ground floor as Windows 10 marches toward its
goal of 1 billion devices within three years.
<div class="embed-responsive embed-responsive-4by3">
<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/nmcdLOjGVzw"></iframe>
</div>
</p>
</div>
</div>
</div>
<!--Fin boton Modal-->
  </div><!-- Columna 1-->
  <div class="col-lg-4">
    <img class="img-circle" src="../images/OfertaImage.png" alt="Generic placeholder image" style width="140" height="140">
    <h2>Oferta</h2>
    <p>Sube videos ,imagenes y dales la mejor cara a tus productos !. Gracias a nuestra plataforma de publicidad digital te encargas de tus productos y nosotros de llevar tu negocio a otro nivel.</p>
 <p><a class="btn btn-default" href="#" role="button">Descubre como &raquo;</a></p>
  </div><!-- /Columna 2 -->

  <div class="col-lg-4">
    <img class="img-circle" src="../images/DiferenciateImage.png" alt="Generic placeholder image" width="140" height="140">
    <h2>Diferenciate</h2>
    <p>El marketing digital es lo que impulsa el exito de los negocios y nosotros sabemos que tu principal objetivo es crecer, y estamos comprometidos para hacerlo realidad.</p>
    <p><a class="btn btn-default" href="#" role="button">Descubre como &raquo;</a></p>
  </div><!--Columna 3 -->
</div>
</div>


@stop

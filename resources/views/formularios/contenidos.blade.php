@extends ('/layouts.cpanel_template')
@section ('worksheets')
<!-- menu Grid Section -->
   <section>
       <br/>
       <br/>
       <br/>

         <div class="row">
             <div class="col-lg-12 text-center">
                 <!--<div id="notificaciones" class="row">

                 </div>-->
                 <div id="notificaciones" class="alert alert-info alert-dismissable" style="display:none">
                         <button type="button" class="close" data-dismiss="alert" >&times;</button>
                 </div>
                 <h2>Información de este negocio</h2>
                 <hr class="star-primary"/>
             </div>
          </div>

          <div class="container">
              <div class="col-lg-6 text-left">
                  <h3><i class="glyphicon glyphicon-list-alt"></i> Detalles del negocio</h3>
                  <hr>
                  <p id="detalles">

                  </p>
              </div>
              <div class="col-md-6 text-left">
                  <h3><i class="glyphicon glyphicon-map-marker"></i> Contacto</h3>
                  <hr>
                  <p id="negocio_numero"><i class="glyphicon glyphicon-earphone"></i> </p>
                  <hr>
                  <p id="negocio_email"><i class="glyphicon glyphicon-envelope"></i> </p>
                  <hr>
                  <h4><i class="glyphicon glyphicon-user"></i> Propietario</h4>
                  <p id="negocio_propietario"> </p>
              </div>
          </div>
          <br>
          <br>
          <br>
         <div class="row">
              <div class="col-lg-12 text-center">
                  <h3><i class="glyphicon glyphicon-map-marker"></i>Ubicación</h3>
                  <hr>
                  <p id="contacto_ubicacion"> </p>
              </div>
          </div>
         <!-- <div class="row">
            <div class="col-lg-12 text-left">
                  <hr class="star-primary">
             </div>
         </div>

         <div class="row">
             <div id="lista_categorias" class="row list-group">
             </div>
          </div>

          <div class="row">
              <div class="col-lg-12 text-left">
                    <h3>Promociones</h3>
                    <hr class="star-primary">
              </div>
          </div>

           <div class="row">

                <div id="lista_promocion" class="row list-group">

                </div>
          </div>
-->
    </section>
@stop

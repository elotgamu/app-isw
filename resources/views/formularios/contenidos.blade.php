@extends ('/layouts.cpanel_template')
@section ('worksheets')
<!-- menu Grid Section -->
   <section>
        <br/>
        <br/>
        <br/>

        <div id="updatenego" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h2>Actualizando información básica</h2>
                    </div>
                    <div class="modal-body">
                        <div class="login-form">
                            <div class="form-group">
                                {!! Form::label('desclbl', 'Descripción: ', array('class' => 'label')) !!}
                                {!! Form::text('descupdatetxt', null,array('class' => 'form-control', 'id'=>'descupdatetxt')) !!}
                                <div class="alert alert-warning alert-dismissable">
                                  <button id="descerror" type="button" class="close" data-dismiss="alert">&times;</button>

                                  </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('sitelbl', 'Ubicación: ', array('class' => 'label')) !!}
                                {!! Form::text('siteupdatetxt', null,array('class' => 'form-control', 'id'=>'siteupdatetxt')) !!}
                                <div class="alert alert-warning alert-dismissable">
                                  <button id="siteerror" type="button" class="close" data-dismiss="alert">&times;</button>

                                  </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('maillbl', 'Correo electrónico: ', array('class' => 'label')) !!}
                                {!! Form::text('mailupdatetxt', null,array('class' => 'form-control', 'id'=>'mailupdatetxt')) !!}
                                <div class="alert alert-warning alert-dismissable">
                                  <button id="mailerror" type="button" class="close" data-dismiss="alert">&times;</button>

                                  </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('phonelbl', 'Teléfono: ', array('class' => 'label')) !!}
                                {!! Form::text('phoneupdatedtxt', null,array('class' => 'form-control', 'id'=>'phoneupdatedtxt', 'maxlength' => 8, 'pattern'=>'[0-9]{8}')) !!}
                                <div class="alert alert-warning alert-dismissable">
                                  <button id="phoneerror" type="button" class="close" data-dismiss="alert">&times;</button>

                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a id='updateinfonego' href="#" class="btn btn-success">Guardar cambios</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- begin the visible stuffs -->
         <div class="row">
             <div class="col-lg-12 text-center">
                 <!--<div id="notificaciones" class="row">

                 </div>-->
                 <div id="notificaciones" class="alert alert-info alert-dismissable" style="display:none">
                         <button type="button" class="close" data-dismiss="alert" >&times;</button>
                 </div>
                 <h2>Información de este negocio</h2>
                 <a data-toggle="modal" href="#updatenego" title="Edita la información de este negocio" onclick='editinfo()'>
                     <span class="glyphicon glyphicon-pencil"></span>
                 </a>
                 <hr class="star-primary"/>
             </div>
          </div>

          <div class="container">
              <div class="col-lg-6 text-left">
                  <h4><i class="glyphicon glyphicon-list-alt"></i> Detalles del negocio</h4>
                  <hr>
                  <p id="detalles">

                  </p>
              </div>
              <div class="col-lg-4 text-left">
                  <h4><i class="glyphicon glyphicon-map-marker"></i> Contacto</h4>
                  <hr>
                  <p id="negocio_numero"><i class="glyphicon glyphicon-earphone"></i>  </p>
                  <hr>
                  <p id="negocio_email"><i class="glyphicon glyphicon-envelope"></i>  </p>
                  <hr>
                  <h4><i class="glyphicon glyphicon-user"></i> Propietario</h4>
                  <p id="negocio_propietario">  </p>
              </div>
          </div>
          <br>
          <br>
          <br>
         <div class="row">
              <div class="col-lg-12 text-center">
                  <h4><i class="glyphicon glyphicon-map-marker"></i>Ubicación</h4>
                  <hr>
                  <p id="contacto_ubicacion"> </p>
              </div>
          </div>

    </section>
@stop

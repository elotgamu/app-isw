@extends ('/layouts.cpanel_template')
@section ('worksheets')
<!-- menu Grid Section -->
   <section>
         <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Menu</h2>
                    <hr class="star-primary">
                </div>
          </div>
            <div class="row">
              {!! Form::open(['url'=>'mi_contenido','files' => true]) !!}
              <div class="row">
                <div class="col-xs-6">
                    <input name="openFile" id="openFile" accept=".pdf" type="file" data-text="true" class="filestyle" data-icon="false" data-buttonName="btn-primary"/>
                </div>
                <div class="col-xs-2">
                      {!! Form::submit('Subir menu',array('class'=>'btn btn-default btn-primary'))!!}
                </div>
              </div>
              <div class="row">
                <div class="lp7-container">
                  <div class="landing-page-container">
                     <br>
                      @if(!isset($ruta_menu))
                              <img class="img-responsive" src="Upload.png" alt="Chania" width="80%" height="80%"></img>
                      @else
                      <div class="embed-responsive embed-responsive-16by9">
                          <iframe src= {{ $ruta_menu }}  height="100%" width="100%"></iframe>
                      </div>
                      @endif
                  </div>
                </div>
              </div>
              {!! Form::close() !!}
            </div>
    </section>
@stop

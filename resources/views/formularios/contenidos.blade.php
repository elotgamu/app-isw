@extends ('/layouts.cpanel_template')
@section ('worksheets')
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
    {!! Form::open(['url'=>'micontenido']) !!}
    <div class="row">
        <div class="col-xs-6">
          <input name="openFile" type="file" data-text="true" class="filestyle" data-icon="false" data-buttonName="btn-primary"/>
        </div>
        <div class="col-xs-2">
            {!! Form::submit('Subir menu',array('class'=>'btn btn-default btn-primary'))!!}
        </div>
    </div>
    <div class="row">
      <br>
      <br>
      <div class="embed-responsive embed-responsive-16by9">
          <!-- <iframe src="http://localhost:7331/pdfjs/web/viewer.html?File=http://localhost:7331/negocios/ejemplo.pdf" height="95%"></iframe> -->
          <iframe src="pdfjs/web/viewer.html?File=/negocios/rest.pdf" height="95%"></iframe>
    </div>
  </div>
    {!! Form::close() !!}
  </div>
    <div class="col-md-2">
    </div>
  </div>
  <div class="row">
  </div>
  <div class="row">
  </div>
@stop

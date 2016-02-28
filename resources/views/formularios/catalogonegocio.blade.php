@extends ('/layouts.default')
@section ('title') Catalogo de negocios @stop

@section ('content')
<div class="container">
  {!! Form::open(['url'=>'catalogo_negocios']) !!}
<div class="row">
  <br>
  <br>
  <br>
  <br>
</div>
<div class="row">
  <div class="container">
    <div class="input-group">
    @if(!isset($busqueda))
          {!! Form::text('busqueda',null,array('placeholder' => 'Busque su restaurante o comedor de preferencia','class' => 'form-control','autofocus')) !!}
    @else
            {!! Form::text('busqueda', $busqueda, array('class' => 'form-control','autofocus')) !!}
    @endif

    <span class="input-group-btn">
      {!! Form::submit('Buscar', array('name' =>'buscar', 'class'=>'btn btn-default btn-group-xs boton'))!!}
    </span>
  </div>
  </div>
  <br>
</div>
<div class="row">
<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading">
  <h3 class="panel-title">Negocios registrados</h3>
  </div>
  <div class="panel-body">
<div class="list-group">
  @if(count($lista)>0)
  @foreach ($lista as $Lista)
                <div href="#" class="list-group-item list-group-item-success">
                  <div class="container">
                  <div class="col-md-7">
                    <h2 class="list-group-item-heading">{{ $Lista->nombre_negocio }}</h2>
                    <p class="list-group-item-text">Telefono No: {{ $Lista->telefono_negocio }}</p>
                  </div>
                  <div class="col-md-4">
                   <div class="row">
                   <br>
                   </div>
                   <div class="row">
                          <!--<input type="submit" name="menu" class="btn btn-default btn-group-xs boton">Ver menú</input> -->
                          {!! Form::submit('Ver menú', array('name' =>'menu', 'class'=>'btn btn-default btn-group-xs boton')) !!}
                          <!--<button type="button" class="btn btn-default btn-group-xs boton">ver información del negocio</button> -->
                          <!--{!! Form::submit('Ver información del negocio', array('class'=>'btn btn-default btn-group-xs boton'))!!} -->
                          {!! Form::submit('Ver información', array('name' =>'detalles', 'class'=>'btn btn-default btn-group-xs boton')) !!}
                          {!! Form::hidden('id_negocio', $Lista->codigo_negocio ) !!}
                          <!-- <input type="submit" name="detalles" class="btn btn-default btn-group-xs boton" value="Información"> -->
                   </div>
                  </div>
                </div>
            </div>
  @endforeach
  @else
  <div class="alert alert-info">
      <p class="list-group-item-text">No se ha encontrado ningun Negocio</p>
  </div>
  @endif
</div>
</div>
</div>
</div>
</div>
{!! Form::close() !!}
</div>
@stop

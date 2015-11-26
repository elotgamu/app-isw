@extends ('/layouts.default')
@section ('title') Catalogo de negocios @stop

@section ('content')
<div class="landing-page-container">
<div class="row">
<br>
<br>
<br>
</div>
<div class="row">
<div class="container">
  <div class="list-group">
  @foreach ($lista as $Lista)
         <div class="list-group">
                <div href="#" class="list-group-item">
                  <div class="container">
                  <div class="col-md-5">
                    <h4 class="list-group-item-heading">{{ $Lista->nombre_negocio }}</h4>
                    <p class="list-group-item-text">Telefono No: {{ $Lista->telefono_negocio }}</p>
                    <p class="list-group-item-text">{{ $Lista->descripcion_negocio }}</p>
                    <p class="list-group-item-text">Direccion: {{ $Lista->ubicacion_negocio }}</p>
                  </div>
                  <div class="col-md-6">
                   <div class="row">
                   <br>
                   <br>
                   </div>
                   <div class="row">
                     <div class="btn-group">
                          <button type="button" class="btn btn-default btn-group-xs boton">Ver menu</button>
                          <button type="button" class="btn btn-default btn-group-xs boton">ver informacion del negocio</button>
                          <button type="button" class="btn btn-default btn-group-xs boton">realzar pedido</button>
                     </div>
                   </div>
                  </div>
                  </div>
                </div>
        </div>
    @endforeach
</div>
</div
</div>
</div>
@stop
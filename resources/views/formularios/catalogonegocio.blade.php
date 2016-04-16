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
</div>
<div class="row">
       <div class="col-lg-12 text-center">
           <h2>Negocios Registrados</h2>
           <hr class="star-primary">
       </div>
 </div>
<div class="row">
<div class="list-group">
  @if(count($lista)>0)
  @foreach ($lista as $Lista)
                <div href="#" class="list-group-item">
                  <div class="container">
                  <div class="col-md-7">
                    <h2 class="list-group-item-heading">{{ $Lista->nombre_negocio }}</h2>
                    <p class="list-group-item-text">Número telefonico: {{ $Lista->telefono_negocio }}</p>
                  </div>
                  <div class="col-md-5">
                   <div class="row">
                   <br>
                   </div>
                   <div class="row">
                        <div class="btn-group">
                         <p>
                            <a href="{{ action("listanegocioController@vermenu",[$Lista->codigo_negocio]) }}" class="btn btn-primary">Ver menu gastronomico</a>
                          </p>
                          <p>
                             <a href="{{ action("loginController@create") }}" class="btn btn-primary">Ver Informacion adicional</a>
                           </p>
                       </div>   
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
{!! Form::close() !!}
</div>
@stop

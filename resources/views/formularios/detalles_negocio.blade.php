@extends('layouts.default')
@section ('content')
<div class="container">
  @if(count($negocio)>0)
  @foreach ($negocio as $Negocio)
    <h2 class="list-group-item-heading">{{ $Negocio->descipcion_negocio }}</h4>
  @endforeach
  @else
  <div class="alert alert-info">
      <p class="list-group-item-text">No se ha encontrado ningun Negocio</p>
  </div>
  @endif
  <p>{{ $negocio }}</p>
</div>
@stop

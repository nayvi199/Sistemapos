@extends('layouts.app')

@section('htmlheader_title')
  Catalogo de productos
@endsection

@section('titulo')
<h2>
  Reporte de Cancelaciones
  <a href="{{url('')}}">
    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
  </a>
</h2>
@stop

@section('main-content')
<h2>Aqui van las cancelaciones</h2>

@endsection()
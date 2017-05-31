@extends('layouts.app')

@section('htmlheader_title')
	Catalogo de productos
@endsection

@section('titulo')
<h2>
  Reporte de Proveedores
  <a href="{{url('')}}">
    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
  </a>
</h2>
@stop


@section('main-content')

<div class="container">
  <h2>Proveedores</h2>
  <p>A continuacion se presenta la lista y informacion de los proveedores que surten nuestra tienda en linea.</p>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>
          <a href="{{url('/registrarProveedor')}}" class="btn btn-success btn-xs">Registrar</a>
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach($proveedores as $p)
        <tr class="warning">
          <td>{{$p->id}}</td>
          <td>{{$p->nombre}}</td>
          <td>{{$p->direccion}}</td>
          <td>{{$p->telefono}}</td>
          <td>{{$p->email_empresa}}</td>
          <td>
          <a href="{{url('/editarProveedor')}}/{{$p->id}}" class="btn btn-xs btn-primary">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </a>
          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal{{$p->id}}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
         </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="modal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">¿Deseas eliminar el Provedor?</h4>
              </div>
              <div class="modal-body">
                ¡No se podrá recuperar el registro!
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="{{url('/eliminarProveedor')}}/{{$p->id}}" class="btn btn-danger">Eliminar</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
   </table>
    <div class="text-center">
    {{$proveedores->links()}}
    </div>
    </tbody>
 
</div>
@endsection()
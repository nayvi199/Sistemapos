@extends('layouts.app')

@section('htmlheader_title')
  Catalogo de productos
@endsection

@section('titulo')
<h2>
  Reporte de Productos
  <a href="{{url('')}}">
    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
  </a>
</h2>
@stop


@section('main-content')

<div class="container">
    <div class="box box-primary box-gris">
      <div class="box-header">
        <form   action="{{ url('buscar_producto') }}"  method="post"  >
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
          <div class="input-group input-group-sm">
            <input type="text" class="form-control" id="dato_buscado" name="dato_buscado" required>
            <span class="input-group-btn">
            <input type="submit" class="btn btn-primary" value="buscar" >
            </span>
          </div>
       </form>
      </div>
    </div>
  
  
   
   

 
  <p>A continuacion se presenta la lista y informacion de los productos que estan en nuestra tienda en linea.</p>
    
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Nombre del Proveedor</th>
        <th>
          <a href="{{url('/registrarProducto')}}" class="btn btn-success btn-xs"> Nuevo Producto</a>
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach($productos as $p)
        <tr class="info">
          <td>{{$p->id}}</td>
          <td>{{$p->nombre}}</td>
          <td>{{$p->descripcion}}</td>
          <td>{{$p->precio}}</td>
          <td>{{$p->nombre_pro}}</td>
          <td>
           <!-- Modificacion del icono para editar-->
          <a href="{{url('/editarProducto')}}/{{$p->id}}" class="btn btn-xs btn-primary">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </a>
           <!-- Modificacion del icono para eliminar, y forma de mandarse con modal para mensaje-->
          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal{{$p->id}}">
          <!-- Cambiar forma del icono remove-->
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
                <h4 class="modal-title" id="myModalLabel">¿Deseas eliminar el Producto?</h4>
              </div>
              <div class="modal-body">
                ¡No se podrá recuperar el registro!
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="{{url('/eliminarProducto')}}/{{$p->id}}" class="btn btn-danger">Eliminar</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
   </table>
    <div class="text-center">
    {{$productos->links()}}
    </div>
    </tbody>
 
</div>

{{ $productos->links() }}

@if(count($productos)==0)


<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              ... no se encontraron resultados para su busqueda...
</label> 

</div>

 </div> 


@endif

@endsection()
@extends('layouts.app')

@section('htmlheader_title')
	Editar informacion del Proveedor
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" action="{{url('actualizarProducto')}}/{{$producto->id}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <legend class="text-center header">Nuevos Datos.</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nombre" name="nombre" type="text" value="{{$producto->nombre}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-list-alt"></i>></span>
                            <div class="col-md-8">
                            <!-- Pegando forma de enviar la descripcion del producto-->
                                <input id="descripcion" name="descripcion" type="text" value="{{$producto->descripcion}}" class="form-control">
                            </div>
                        </div>
                          <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-usd"></i></span>
                            <div class="col-md-8">
                                <input id="precio" name="precio" type="text" value="{{$producto->precio}}" class="form-control">
                            </div>
                        </div>

                        
                        <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-truck"></i></span>
                      <div class="col-md-8">
                      <!--Modificando el select para el product id desplegable-->
                        <select name="id_pro" class="form-control" required>
                            <option value="{{$producto->id_pro}}" selected>{{$producto->id_pro}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                       </div>  
                      </div>

                      

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            <!--Cambiando forma de los iconos, editar y cancelar para redireccion-->
                                <button type="submit" class="btn btn-primary btn-lg">Editar</button>
                                <a href="{{url('/verProductos')}}" class="btn btn-danger btn-lg">Cancelar</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection()
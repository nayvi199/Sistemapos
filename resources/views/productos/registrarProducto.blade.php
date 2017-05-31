@extends('layouts.app')

@section('htmlheader_title')
	Agregar Producto
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
            Reporte de Productos
            <!--Agregar aqui para imprimir el pdf-->
        <a href="{{url('')}}">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
        </a>
                <form class="form-horizontal" action="{{url('/agregarProducto')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <legend class="text-center header">Datos del Producto</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-list-alt"></i></span>
                            <div class="col-md-8">
                                <input id="descripcion" name="descripcion" type="text" placeholder="Descripcion del Producto" class="form-control">
                            </div>
                        </div>

                          <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-usd"></i></span>
                            <div class="col-md-8">
                                <input id="precio" name="precio" type="text" placeholder="Precio del producto" class="form-control">
                            </div>
                        </div>

                        
                      <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-truck"></i></span>
                      <div class="col-md-8">
                        <select name="id_pro" class="form-control" required>
                            <option value="1" selected>Seleccione el proveedor</option>
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
                                <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
                                <a href="{{url('/')}}" class="btn btn-danger btn-lg">Cancelar</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection()
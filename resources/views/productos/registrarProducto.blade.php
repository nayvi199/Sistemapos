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
                      @foreach(App\Proveedor::get() as $p)
                        <select name="id_pro" class="form-control" required>
                            <option value="" selected>Seleccione el proveedor</option>
                            <option value="{{$p->id}}">{{$p->id}}.- {{$p->nombre}}</option>
                         </select>
                        @endforeach
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
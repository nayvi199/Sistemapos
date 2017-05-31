@extends('layouts.app')

@section('htmlheader_title')
	Editar informacion del Proveedor
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" action="{{url('actualizarProveedor')}}/{{$proveedor->id}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <legend class="text-center header">Nuevos Datos</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nombre" name="nombre" type="text" value="{{$proveedor->nombre}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-building"></i><i class="fa fa-car" aria-hidden="true"></i></span>
                            <div class="col-md-8">
                                <input id="direccion" name="direccion" type="text" value="{{$proveedor->direccion}}" class="form-control">
                            </div>
                        </div>
                          <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="telefono" name="telefono" type="text" value="{{$proveedor->telefono}}" class="form-control">
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email_empresa" name="email_empresa" type="text" value="{{$proveedor->email_empresa}}" class="form-control">
                            </div>
                        </div>

                      

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Editar</button>
                                <a href="{{url('/verProveedores')}}" class="btn btn-danger btn-lg">Cancelar</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection()
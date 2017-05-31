@extends('layouts.app')

@section('htmlheader_title')
	Inicio
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Bienvenido al Inicio</div>

					<div class="panel-body">
						
						@if(Auth::user()->tipo==2)
						{{ trans('adminlte_lang::message.logged') }} Como Administrador
						@endif

						@if(Auth::user()->tipo==1)
						{{ trans('adminlte_lang::message.logged') }} Como Gerente
						@endif
						@if(Auth::user()->tipo==3)
						{{ trans('adminlte_lang::message.logged') }} Como Empleado
						@endif
						@if(Auth::user()->tipo==0)
						{{ trans('adminlte_lang::message.logged') }} Como Cliente. Tenga una buena compra.
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

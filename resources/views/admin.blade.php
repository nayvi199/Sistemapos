
@extends('layouts.app')

@section('htmlheader_title')
	Inicio Administrador
@endsection


@section('main-content')
	<div class="container spark-screen">
	<h1>entraste como administrador</h1>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">
						{{ trans('adminlte_lang::message.logged') }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

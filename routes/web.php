<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

/*Routas para todo el que inicie sesion, administrador*/
Route::group(['middleware' => 'auth'], function () {
	
    //para ver lo del usuario

	Route::get('/home', 'HomeController@index');
    //Route::get('sidebar/{id}', 'UsuariosController@use_rol');
    Route::get('/listado_usuarios', 'UsuariosController@listado_usuarios');
    Route::post('crear_usuario', 'UsuariosController@crear_usuario');
    Route::post('editar_usuario', 'UsuariosController@editar_usuario');
    Route::post('buscar_usuario', 'UsuariosController@buscar_usuario');
    Route::post('borrar_usuario', 'UsuariosController@borrar_usuario');
    Route::post('editar_acceso', 'UsuariosController@editar_acceso');
  

    Route::post('crear_rol', 'UsuariosController@crear_rol');
    Route::post('crear_permiso', 'UsuariosController@crear_permiso');
    Route::post('asignar_permiso', 'UsuariosController@asignar_permiso');
    Route::get('quitar_permiso/{idrol}/{idper}', 'UsuariosController@quitar_permiso');
    
    
    Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario');
    Route::get('form_nuevo_rol', 'UsuariosController@form_nuevo_rol');
    Route::get('form_nuevo_permiso', 'UsuariosController@form_nuevo_permiso');
    Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
    Route::get('confirmacion_borrado_usuario/{idusuario}', 'UsuariosController@confirmacion_borrado_usuario');
    Route::get('asignar_rol/{idusu}/{idrol}', 'UsuariosController@asignar_rol');
    Route::get('quitar_rol/{idusu}/{idrol}', 'UsuariosController@quitar_rol');
    Route::get('form_borrado_usuario/{idusu}', 'UsuariosController@form_borrado_usuario');
    Route::get('borrar_rol/{idrol}', 'UsuariosController@borrar_rol');

  
    //Para las ventas,productos, proveedores, aqui van las vistas principales
    Route::get('verVentas', 'UsuariosController@verVentas');
    Route::get('verProductos', 'UsuariosController@verProductos');
    Route::get('verProveedores', 'UsuariosController@verProveedores');

    //aqui se muestra la pantalla para agregar
    Route::post('/agregarProveedor', 'UsuariosController@agregarProveedor');
    Route::get('/registrarProveedor', 'UsuariosController@registrarProveedor');
    Route::get('editarProveedor/{id}', 'UsuariosController@editarProveedor');
    Route::get('/eliminarProveedor/{id}', 'UsuariosController@eliminarProveedor'); 
    Route::post('actualizarProveedor/{id}', 'UsuariosController@actualizarProveedor'); 

    //para los productos
    Route::post('/agregarProducto', 'UsuariosController@agregarProducto');
    Route::get('/registrarProducto', 'UsuariosController@registrarProducto');
    Route::get('editarProducto/{id}', 'UsuariosController@editarProducto');
    Route::get('/eliminarProducto/{id}', 'UsuariosController@eliminarProducto'); 
    Route::post('actualizarProducto/{id}', 'UsuariosController@actualizarProducto');


    //para las cancelaciones

    Route::get('/verCancelaciones', 'UsuariosController@verCancelaciones');


    //Para los proveedores

    






});

       /*Route::get('/', function()
        {
           
                return view('/admin');
        })
        ->middleware('roleshinobi:administrador');

        Route::get('/home', function()
        {
           
                return view('/gerente');
        })
        ->middleware('roleshinobi:gerente');*/


/*Route::group(['middleware' => ['auth','administrador'], 'prefix' => 'admin'], function(){
    
        return view('/admin');
        //return "admin";
   
   // Route::resource('cliente','ClienteController');

    //Route::resource('vehiculo','VehiculoController');


}); */






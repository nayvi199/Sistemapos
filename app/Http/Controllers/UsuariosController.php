<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Proveedor;
use App\Producto;
use DB;
use Illuminate\Support\Facades\Validator;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class UsuariosController extends Controller
{
 
 public function verVentas()
 {
  //aqui pones la ventana que sea 
  //es la carpeta.nombredevista
  return view("ventas.verVentas");
 }

 
  public function verCancelaciones()
 {
  //aqui pones la ventana que sea 
  //es la carpeta.nombredevista
  return view("cancelaciones.verCancelaciones");
 }

  public function verProductos()
 {
   //aqui pones la ventana que sea 
    //es la carpeta.nombredevista

    $productos=DB::table('productos')
    ->join('proveedores', 'productos.id_pro', '=', 'proveedores.id')
    ->select('productos.*','proveedores.nombre AS nombre_pro')
    ->paginate(10);
    //return view("proveedores.verProveedores");
  return view("productos.verProductos",compact('productos'));
 }
  /*public function verProductos()
 {
   //aqui pones la ventana que sea 
    //es la carpeta.nombredevista

    $productos=DB::table('productos')
    ->select('productos.*')
    ->paginate(10);
    //return view("proveedores.verProveedores");
  return view("productos.verProductos",compact('productos'));
 }*/


  public function verProveedores()
 {
    //aqui pones la ventana que sea 
    //es la carpeta.nombredevista

    $proveedores=DB::table('proveedores')
    ->select('proveedores.*')
    ->paginate(10);
    return view('proveedores.verProveedores', compact('proveedores'));
    //return view("proveedores.verProveedores");
 }


    public function registrarProveedor(){
      return view('proveedores.registrarProveedor');
    }

    //metodo que recibe el POST de registrar 
    public function agregarProveedor(Request $datos){
      $proveedor= new Proveedor();
      $proveedor->nombre=$datos->input('nombre');
      $proveedor->direccion=$datos->input('direccion');
      $proveedor->telefono=$datos->input('telefono');
      $proveedor->email_empresa=$datos->input('email_empresa');
      $proveedor->save();

      //Una vez que guarda regresa al inicio, o puede redireccionar donde estan todos los proveedores
      return Redirect('/verProveedores');
    }

    public function eliminarProveedor($id){
      $proveedor=Proveedor::find($id);
      $proveedor->delete();
      return Redirect('/verProveedores');
    }

    public function editarProveedor($id){
      $proveedor=Proveedor::find($id);
      return view('proveedores.editarProveedor',compact('proveedor'));
    }


    public function actualizarProveedor(Request $datos, $id){
      $proveedor=Proveedor::find($id);
      $proveedor->nombre=$datos->input('nombre');
      $proveedor->direccion=$datos->input('direccion');
      $proveedor->telefono=$datos->input('telefono');
      $proveedor->email_empresa=$datos->input('email_empresa');
      $proveedor->save();

      //Una vez que guarda regresa al inicio, o puede redireccionar donde estan todos los proveedores
      return Redirect('/verProveedores');
    }

     public function registrarProducto(){
      return view('productos.registrarProducto');
    }
    public function agregarProducto(Request $datos){
      $producto= new Producto();
      $producto->nombre=$datos->input('nombre');
      $producto->descripcion=$datos->input('descripcion');
      $producto->precio=$datos->input('precio');
      $producto->id_pro=$datos->input('id_pro');
      $producto->save();

      //Una vez que guarda regresa al inicio, o puede redireccionar donde estan todos los proveedores
      return Redirect('/verProductos');
    }

    public function eliminarProducto($id){
      $producto=Producto::find($id);
      $producto->delete();
      return Redirect('/verProductos');
    }

    public function editarProducto($id){
      $producto=Producto::find($id);
      return view('productos.editarProducto',compact('producto'));
    }

      public function actualizarProducto(Request $datos, $id){
      $producto=Producto::find($id);
      $producto->nombre=$datos->input('nombre');
      $producto->descripcion=$datos->input('descripcion');
      $producto->precio=$datos->input('precio');
      $producto->id_pro=$datos->input('id_pro');
      $producto->save();

      //Una vez que guarda regresa al inicio, o puede redireccionar donde estan todos los proveedores
      return Redirect('/verProductos');
    }















/*
//crear las relaciones para ver por nombre
         public function use_rol($id){
         $use_rol = DB::table('role_user')
        ->join('user', 'role_user.role_id','=','users.id')
        ->join('roles', 'role_user.user_id','=','roles.id')
        ->select('role_user.role_id as id_role', 'role_user.user_id as id_user' ,'roles.slug as nombre_slug')
        ->where('role_user.user_id',$id)
        ->get();
        //oh layouts/slidder
        return view('home', compact('use_rol'));
        }*/






public function form_nuevo_usuario(){
    //carga el formulario para agregar un nuevo usuario
    $roles=Role::all();
    return view("formularios.form_nuevo_usuario")->with("roles",$roles);

}


public function form_nuevo_rol(){
    //carga el formulario para agregar un nuevo rol
    $roles=Role::all();
    return view("formularios.form_nuevo_rol")->with("roles",$roles);
}

public function form_nuevo_permiso(){
    //carga el formulario para agregar un nuevo permiso
     $roles=Role::all();
     $permisos=Permission::all();
    return view("formularios.form_nuevo_permiso")->with("roles",$roles)->with("permisos", $permisos);
}



public function listado_usuarios(){
    //presenta un listado de usuarios paginados de 100 en 100
	$usuarios=User::paginate(100);
	return view("listados.listado_usuarios")->with("usuarios",$usuarios);
}





public function crear_usuario(Request $request){
    //crea un nuevo usuario en el sistema

	$reglas=[  'password' => 'required|min:8',
	             'email' => 'required|email|unique:users', ];
	 
	$mensajes=[  'password.min' => 'El password debe tener al menos 8 caracteres',
	             'email.unique' => 'El email ya se encuentra registrado en la base de datos', ];
	  
	$validator = Validator::make( $request->all(),$reglas,$mensajes );
	if( $validator->fails() ){ 
	  	return view("mensajes.mensaje_error")->with("msj","...Existen errores...")
	  	                                    ->withErrors($validator->errors());         
	}

	$usuario=new User;
	$usuario->name=strtoupper( $request->input("nombres")." ".$request->input("apellidos") ) ;
	$usuario->nombres=strtoupper( $request->input("nombres") ) ;
  $usuario->apellidos=strtoupper( $request->input("apellidos") ) ;
	$usuario->telefono=$request->input("telefono");
	$usuario->email=$request->input("email");
	$usuario->password= bcrypt( $request->input("password") ); 
 
            
    if($usuario->save())
    {

  
      return view("mensajes.msj_usuario_creado")->with("msj","Usuario agregado correctamente") ;
    }
    else
    {
        return view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ;...") ;
    }

}



public function crear_rol(Request $request){

   $rol=new Role;
   $rol->name=$request->input("rol_nombre") ;
   $rol->slug=$request->input("rol_slug") ;
   $rol->description=$request->input("rol_descripcion") ;
    if($rol->save())
    {
        return view("mensajes.msj_rol_creado")->with("msj","Rol agregado correctamente") ;
    }
    else
    {
        return view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ;...") ;
    }
}




public function crear_permiso(Request $request){

  
   $permiso=new Permission;
   $permiso->name=$request->input("permiso_nombre") ;
   $permiso->slug=$request->input("permiso_slug") ;
   $permiso->description=$request->input("permiso_descripcion") ;
    if($permiso->save())
    {
        return view("mensajes.msj_permiso_creado")->with("msj","Permiso creado correctamente") ;
    }
    else
    {
        return view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ;...") ;
    }


}

public function asignar_permiso(Request $request){



     $roleid=$request->input("rol_sel");
     $idper=$request->input("permiso_rol");
     $rol=Role::find($roleid);
     $rol->assignPermission($idper);
    
    if($rol->save())
    {
        return view("mensajes.msj_permiso_creado")->with("msj","Permiso asignado correctamente") ;
    }
    else
    {
        return view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ;...") ;
    }



}



public function form_editar_usuario($id){
    $usuario=User::find($id);
    $roles=Role::all();
    return view("formularios.form_editar_usuario")->with("usuario",$usuario)
	                                              ->with("roles",$roles);                                 
}

public function editar_usuario(Request $request){
          
    $idusuario=$request->input("id_usuario");
    $usuario=User::find($idusuario);
    $usuario->name=strtoupper( $request->input("nombres") ) ;
    $usuario->apellidos=strtoupper( $request->input("apellidos") ) ;
    $usuario->telefono=$request->input("telefono");
    
     if($request->has("rol")){
	    $rol=$request->input("rol");
	    $usuario->revokeAllRoles();
	    $usuario->assignRole($rol);
     }
	 
    if( $usuario->save()){
		return view("mensajes.msj_usuario_actualizado")->with("msj","Usuario actualizado correctamente")
	                                                   ->with("idusuario",$idusuario) ;
    }
    else
    {
		return view("mensajes.mensaje_error")->with("msj","..Hubo un error al agregar ; intentarlo nuevamente..");
    }
}


public function buscar_usuario(Request $request){
	$dato=$request->input("dato_buscado");
	$usuarios=User::where("name","like","%".$dato."%")->orwhere("apellidos","like","%".$dato."%")                                              ->paginate(100);
	return view('listados.listado_usuarios')->with("usuarios",$usuarios);
      }

  public function buscar_producto(Request $request){
  $dato=$request->input("dato_buscado");
  $productos=Producto::where("nombre","like","%".$dato."%")->orwhere("descripcion","like","%".$dato."%")                                              ->paginate(10);
  return view('productos.verProductos')->with("productos",$productos);
      }    




public function borrar_usuario(Request $request){

   
        $idusuario=$request->input("id_usuario");
        $usuario=User::find($idusuario);
    
        if($usuario->delete()){
             return view("mensajes.msj_usuario_borrado")->with("msj","Usuario borrado correctamente") ;
        }
        else
        {
            return view("mensajes.mensaje_error")->with("msj","..Hubo un error al agregar ; intentarlo nuevamente..");
        }
        
     
}

public function editar_acceso(Request $request){
         $idusuario=$request->input("id_usuario");
         $usuario=User::find($idusuario);
         $usuario->email=$request->input("email");
         $usuario->password= bcrypt( $request->input("password") ); 
          if( $usuario->save()){
        return view("mensajes.msj_usuario_actualizado")->with("msj","Usuario actualizado correctamente")->with("idusuario",$idusuario) ;
         }
          else
          {
        return view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ; intentarlo nuevamente ...") ;
          }
}



public function asignar_rol($idusu,$idrol){

        $usuario=User::find($idusu);
        $usuario->assignRole($idrol);

        $usuario=User::find($idusu);
        $rolesasignados=$usuario->getRoles();
        
        return json_encode ($rolesasignados);


}


public function quitar_rol($idusu,$idrol){

    $usuario=User::find($idusu);
    $usuario->revokeRole($idrol);
    $rolesasignados=$usuario->getRoles();
    return json_encode ($rolesasignados);


}


public function form_borrado_usuario($id){
  $usuario=User::find($id);
  return view("confirmaciones.form_borrado_usuario")->with("usuario",$usuario);

}


public function quitar_permiso($idrole,$idper){ 
    
    $role = Role::find($idrole);
    $role->revokePermission($idper);
    $role->save();

    return "ok";
}


public function borrar_rol($idrole){

    $role = Role::find($idrole);
    $role->delete();
    return "ok";
}


}

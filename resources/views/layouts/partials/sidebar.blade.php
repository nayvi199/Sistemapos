<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/avatar_plusis.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

       

          

        <!-- ES TIPO ADMINISTRADOR Y TIENE TODOS LOS DERECHOS -->
        @if(Auth::user()->tipo==2)
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">FUNCIONES</li>
            <!-- Optionally, you can add icons to the links -->
     
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>USUARIOS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('listado_usuarios') }}">Listado Usuarios</a></li>
                    <li><a href="#"></a></li>
                </ul>

             </li>  
             
            <li class="treeview">  
                 <a href="#"><i class='fa fa-laptop'></i> <span>VENTAS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('verVentas') }}">Realizar Venta</a></li>
                    <li><a href="#">Eliminar Venta</a></li>
                </ul>
             </li> 

             <li class="treeview">   
                  <a href="#"><i class='fa fa-th'></i> <span>PRODUCTOS</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('verProductos') }}">Ver catalogo </a></li>
                    <li><a href="{{ url('registrarProducto') }}">Agregar Producto</a></li>
                    <li><a href="{{ url('') }}">Eliminar Producto</a></li>
                </ul>
            </li>    

            <li class="treeview"> 
                  <a href="#"><i class='fa fa-users'></i> <span>PROVEEDORES</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('verProveedores') }}">Lista de Proveedores</a></li>
                    <li><a href="{{ url('registrarProveedor') }}">Agregar Proveedor</a></li>
                    <li><a href="{{ url('') }}">Eliminar Proveedor</a></li>
                </ul>
            </li>
            
            <li class="treeview">     

                 <a href="#"><i class='fa fa-users'></i> <span>CANCELACIONES</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('verCancelaciones') }}">Ver Cancelaciones</a></li>
                    <li><a href="{{ url('') }}">r</a></li>
                </ul>
            </li>    

           
        </ul><!-- /.sidebar-menu -->
         @endif

         <!-- Si es del tipo Gerente-->
       @if(Auth::user()->tipo==1)
          <ul class="sidebar-menu">
            <li class="header">FUNCIONES</li>
            <!-- Optionally, you can add icons to the links --> 
             
            <li class="treeview">  
                 <a href="#"><i class='fa fa-laptop'></i> <span>VENTAS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('verVentas') }}">Realizar Venta</a></li>
                    <li><a href="#">Eliminar Venta</a></li>
                </ul>
             </li> 

             <li class="treeview">   
                  <a href="#"><i class='fa fa-th'></i> <span>PRODUCTOS</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('') }}">Agregar Producto</a></li>
                    <li><a href="{{ url('') }}">Eliminar Producto</a></li>
                </ul>
            </li>    

            <li class="treeview"> 
                  <a href="#"><i class='fa fa-car '></i> <span>PROVEEDORES</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('') }}">Agregar Proveedor</a></li>
                    <li><a href="{{ url('') }}">Eliminar Proveedor</a></li>
                </ul>
            </li>
            
            <li class="treeview">     

                 <a href="#"><i class='fa fa-long-arrow-down'></i> <span>CANCELACIONES</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('') }}">Ver Cancelacionr</a></li>
                    <li><a href="{{ url('') }}">r</a></li>
                </ul>
            </li>    

           
        </ul><!-- /.sidebar-menu -->
         @endif

         <<!--Para el Empleado-->
        @if(Auth::user()->tipo==3)
         <ul class="sidebar-menu">
            <li class="header">FUNCIONES</li>
            <!-- Optionally, you can add icons to the links --> 
             
            <li class="treeview">  
                 <a href="#"><i class='fa fa-laptop'></i> <span>VENTAS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('verVentas') }}">Realizar Venta</a></li>
                    <li><a href="#">Eliminar Venta</a></li>
                </ul>
             </li> 

             <li class="treeview">   
                  <a href="#"><i class='fa fa-th'></i> <span>PRODUCTOS</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('') }}">Agregar Producto</a></li>
                    <li><a href="{{ url('') }}">Eliminar Producto</a></li>
                </ul>
            </li>    

            <li class="treeview"> 
                  <a href="#"><i class='fa fa-car '></i> <span>PROVEEDORES</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('') }}">Agregar Proveedor</a></li>
                    <li><a href="{{ url('') }}">Eliminar Proveedor</a></li>
                </ul>
            </li>
            
             

           
        </ul><!-- /.sidebar-menu -->
        @endif

        <<!--Para el cliente, o guest-->
          @if(Auth::user()->tipo==0)
         <ul class="sidebar-menu">
            <li class="header">FUNCIONES</li>
            <!-- Optionally, you can add icons to the links --> 


             <li class="treeview">   
                  <a href="#"><i class='fa fa-th'></i> <span>COMPRAS</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="{{ url('') }}">Ver Productos </a></li>
                    <li><a href="{{ url('') }}">..</a></li>
                </ul>
            </li>    

         
            
             

           
        </ul><!-- /.sidebar-menu -->
        @endif

    </section>
    <!-- /.sidebar -->
</aside>

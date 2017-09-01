<!-- Left navbar-header -->
@if(Auth::check()) <?php $permisos = Auth::user()->permisos(); ?> @else <?php $permisos = [];?>@endif
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
      <ul class="nav" id="side-menu">
        <li class="sidebar-search hidden-sm hidden-md hidden-lg">
        </li>
        <li> <a href="{!!url('/')!!}" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Inicio</span></a>
        </li>
         @if(in_array(5, $permisos))
        <li><a href="#" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Reportes <span class="fa arrow"></span></span></a>
           <ul class="nav nav-second-level two-li"> 
             <li><a href="{!!url('administracion_usuarios')!!}">Estadisticas </a></li>
             <li><a href="{!!url('reportes')!!}">Reportes </a></li>
            </ul>
        </li>
          @endif
          @if(in_array(8, $permisos) || in_array(23, $permisos) || in_array(13, $permisos) || in_array(28, $permisos) || in_array(18, $permisos) || in_array(18, $permisos))
        <li> <a href="#" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Administración<span class="fa arrow"></span></span></a>
          <ul class="nav nav-second-level two-li">  
           @if(in_array(8, $permisos))
             <li><a href="{!!url('administracion_usuarios')!!}">Usuarios </a></li>
           @endif
           @if(in_array(23, $permisos))
             <li><a href="{!!url('administracion_entidades')!!}">Entidades </a></li>
           @endif
           
           @if(in_array(13, $permisos))   
             <li><a href="{!!url('administracion_titulos')!!}">Titulos</a></li>
           @endif
           @if(in_array(28, $permisos)) 
             <li><a href="{!!url('administracion_categorias')!!}">Categorias </a></li>
           @endif
           @if(in_array(18, $permisos))
              <li><a href="{!!url('administracion_perfiles')!!}">Perfiles </a></li>
           @endif
            @if(in_array(18, $permisos))
              <li><a href="{!!url('centros_de_costos')!!}">Centros de costo </a></li>
           @endif
          </ul>
        </li>
        @endif
        @if(in_array(33, $permisos) || in_array(35, $permisos) || in_array(34, $permisos) || in_array(36, $permisos))
         <li> <a href="#" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Configuración<span class="fa arrow"></span></span></a>
          <ul class="nav nav-second-level two-li">
           @if(in_array(33, $permisos))
             <li><a href="{!!url('configuracion_general')!!}">General</a></li>
          @endif  
           @if(in_array(35, $permisos))
             <li><a href="{!!url('configuracion_mantenimiento')!!}">Mantenimiento</a></li>
           @endif   
           @if(in_array(34, $permisos))   
             <li><a href="{!!url('configuracion_logs')!!}">Logs</a></li>
            @endif  
            @if(in_array(36, $permisos))  
             <li><a href="{!!url('configuracion_funcionalidades')!!}">Funcionalidades </a></li>
            @endif  
          </ul>
        </li>
@endif
</ul>
    </div>
  </div>
  <!-- Left navbar-header end -->

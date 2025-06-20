<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ asset('images/LogoInicio.png') }}" alt="Logo" class="brand-image img-circle elevation-3" >
        <span class="brand-text font-weight" style="color: white">PANEL DE CONTROL</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

                <!-- ROLES Y PERMISO -->
                @can('sidebar.roles.y.permisos')
                 <li class="nav-item">

                     <a href="#" class="nav-link nav-">
                        <i class="far fa-edit"></i>
                        <p>
                            Roles y Permisos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" target="frameprincipal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rol y Permisos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.permisos.index') }}" target="frameprincipal" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuario</p>
                            </a>
                        </li>

                        <!-- Botón de Tabla de Productos -->
                        <li class="nav-item">
                            <a href="{{ route('tablaProductos.indexProductos') }}" class="nav-link" target="frameprincipal">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                    </ul>
                 </li>
                @endcan

                <!-- Botón de Productos -->
                <li class="nav-item">
                    <a href="{{ route('tablaProductos.usuarioProductos') }}" class="nav-link" target="frameprincipal"> <!-- Usa route() correctamente -->
                    <img src="{{ asset('images/listaDeCompra.png') }}" alt="Productos" class="brand-image img-circle elevation-3" style="width: 20px; height: 20px;">
                        <p>Lista de Productos</p>
                    </a>
                </li>

                <!-- Botón de Calculadora -->
                <li class="nav-item">
                    <a href="{{ route('calculadora') }}" class="nav-link" target="frameprincipal"> <!-- Usa route() correctamente -->
                    <img src="{{ asset('images/calculadoraBlade.png') }}" alt="Calculadora" class="brand-image img-circle elevation-3" style="width: 20px; height: 20px;">
                        <p>Calculadora</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

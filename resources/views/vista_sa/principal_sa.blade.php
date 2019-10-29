@extends('layout.app')  

@extends('layout.navbar')

@section('title', 'SuperAdmin')
<!--Custom style sheet-->
<link rel="stylesheet" href="{{ asset("css/style.css") }}">
<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#"><i class="fas fa-bars"></i></a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a>Sistema</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" style="width: 60px; height:60px;" src="{{ asset("img/avatar.png") }}" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name">Gerardo<strong> González</strong></span>
                    <span class="user-role">Administrador</span>
                    <span class="user-status"><i class="fa fa-circle"></i><span> Online</span></span>
                </div>
            </div>

            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu"><span>Información general</span></li>
                    <li class="sidebar-dropdown">
                        <a href="#"><i class="fa fa-users"></i><span> Servicio social</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#" onclick="menu(1);"> <i class="fa fa-inbox"></i> Alumnos registrados</a>
                                </li>
                                <li>
                                    <a href="#" onclick="menu(2);"> <i class="fa fa-history"></i> Historial del alumno</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#"><i class="fa fa-laptop"></i><span> Centro de computo</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#" onclick="menu(3);"><i class="fa fa-eraser"></i> Estadisticas</a>
                                </li>
                                <li>
                                    <a href="#" onclick="menu(4);"><i class="fa fa-angry"></i> Alumnos frecuentes</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu"><span>Consulta</span></li>
                    <li class="sidebar-dropdown"><a href="#" onclick="menu(5);"><i class="fa fa-user"></i><span> Usuarios</span></a></li>        
                    </li>
                </ul>
            </div>
        </div>

          <!-- sidebar-content (Iconos)-->
        <div class="sidebar-footer">
            <a href="#Salir"><i class="fa fa-power-off"></i></a>
        </div>
    </nav>
    <!-- Contenido principal -->
    <main class="page-content">
        <div class="container" id="contenido_principal">
            <h2>Contenido principal</h2>
                    
        </div>
    </main>
</div>


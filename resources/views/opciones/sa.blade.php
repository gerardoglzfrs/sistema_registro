<div class="sidebar-menu">
        <ul>
            <li class="header-menu"><span>Información general</span></li>
            <li class="sidebar-dropdown">
                <a href="#"><i class="fa fa-users"></i><span> Servicio social</span></a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="#" onclick="menu(1);"> <i class="fa fa-inbox"></i> Alumnos en servicio</a>
                        </li>
                        <li>
                            <a href="#" onclick="menu(2);"> <i class="fa fa-history"></i> Historial del alumno</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-dropdown" aria-disabled="true">
                <a href="#"><i class="fa fa-laptop"></i><span> Centro de computo</span></a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="#" onclick="menu(3);"><i class="fa fa-eraser"></i> Registros</a>
                        </li>
                        <li>
                            <a href="#" id="grphdefault"><i class="fa fa-eraser"></i> Estadisticas</a>
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
        </ul>
    </div>
    <script src="{{ asset("js/jquery.min.js") }}"></script>
    <script>
        $("#grphdefault").click(function (){
            $.ajax({
                url: "defaultgrph",
                method: "GET",
                beforeSend: function(){
                    $("#contenido_principal").html("<div class='loader'> loading... </div>");
                },
                success: function(respuesta){
                    $("#contenido_principal").html(respuesta);
                }
            });
        });
    </script>

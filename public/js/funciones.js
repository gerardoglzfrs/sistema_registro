/*Funcion de la hora
window.onload=hora;
fecha= new Date();
function hora(){
    var hora = fecha.getHours();
    var minutos = fecha.getMinutes();
    var segundos = fecha.getSeconds();

    if(hora<10){
        hora = '0'+hora;
    }
    if (minutos<10) {
        minutos = '0'+minutos;
    }
    if (segundos<10) {
        segundos = '0'+segundos;
    }
    datos=hora+":"+minutos+":"+segundos;

    document.getElementById("hora").innerHTML=datos;
    fecha.setSeconds(fecha.getSeconds()+1);
    setTimeout("hora()",1000);
}
*/
//Barra lateral derecha
$(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if (
      $(this)
        .parent()
        .hasClass("active")
    ) {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .parent()
        .removeClass("active");
    } else {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .next(".sidebar-submenu")
        .slideDown(200);
      $(this)
        .parent()
        .addClass("active");
    }
  });
  
  $("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
  });

//Opciones de menu
 function menu(opcion){
   var tok_key = $("#token1").val();
    $.ajax({
    headers: {'X-CSRF-TOKEN': tok_key},  
    type: "POST",
    url: 'ops',
    data: {opcion: opcion},
    beforeSend: function(){
      $("#contenido_principal").html("<img src='img/ajax-loader.gif')'>");
    },
    success: function(respuesta){
      $("#contenido_principal").html(respuesta)
    } 
  });
 }

 


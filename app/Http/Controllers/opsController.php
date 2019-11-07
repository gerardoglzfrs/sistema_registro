<?php

namespace system_register\Http\Controllers;

use Illuminate\Http\Request;

class opsController extends Controller
{
    
    public function index(){
        $opcion = $_POST['opcion']; 
        //echo "Opciones seleccionadas".$opcion;
    
        switch ($opcion) {
            case 1:
                return view("vista_ss.servicio");
                break;
            
            case 2:
                return view("vista_ss.historial_Servicio");
                break;

            case 3:
                return view("vista_cc.registros");
                break;
            
            case 4: 
                return "hola";
                break;
                
            case 5: 
                return "hola";
                break;

            case 6:
                return view("vista_sa.registrar");
                break;
                
            default:
                echo "Erorr. Contacta al administrador";
                break;
           
        }
    }
    
}

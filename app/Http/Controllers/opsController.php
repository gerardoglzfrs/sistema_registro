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
                return view("vista_ss.principal_ss");
                break;
            
            case 2:
                return view("vista_cc.principal_cc");
                break;

            case 3:
                return view("graficas.grph");
                break;
                
            default:
                echo "Erorr. Contacta al administrador";
                break;
           
        }
    }
    
}

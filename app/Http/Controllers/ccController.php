<?php

namespace system_register\Http\Controllers;

use Illuminate\Http\Request;
use system_register\Student;
use Carbon\Carbon;
use Session;
use DB;

class ccController extends Controller
{
    public function registrar(){
        $num_control = $_POST['num_control'];
        $url = "http://167.114.218.98/sistema/services/alumno.php?no_control=".$num_control."";
        $datos = (array)json_decode(file_get_contents($url));
        
        if(sizeof($datos)==0){
            Session::flash('not_found', 'No existe alumno con ese número de control');
            return view('vista_cc.registros');
        }else{
        foreach($datos as $dato){
            $no_control = $dato->no_de_control;
            $nombre = $dato->nombre_alumno;
            $ap = $dato->apellido_paterno;
            $am = $dato->apellido_materno;
            $carrera = $dato->nombre_carrera;
            $foto = $dato->foto;

            $url = str_replace("*","/", $foto);
            $fecha = Carbon::now();
         
            $student = new Student();
            $student->foto = $url;
            $student->num_control = $no_control;
            $student->nombre = $nombre;
            $student->ape_p = $ap;
            $student->ape_m =$am;
            $student->carrera = $carrera;
            $student->hora_ent = $fecha->toTimeString();
            $student->fecha = $fecha->toDateString();
            $student->id = 3;
            $student->save();
            }
        }
    }
    
    public function showStudents(){
        $students = Student::where('fecha',Carbon::now()->toDateString())->orderBy('hora_ent','desc')->get();
        return response()->json($students->toArray());
    }

    public function estadisticas($periodo){
        if (substr($periodo,5,9)=="01-01") {
            $final = substr($periodo,0,4)."-05-30";
            $periodo2 = "Ene-Jun/".substr($periodo,0,4);
        }else{
            $final = substr($periodo,   0,4)."-12-30 : ".$periodo;
            $periodo2 = "Ago-Dic/".substr($periodo,0,4);
        }
        $grph = DB::select("SELECT carrera, COUNT(*) 'total' from registros where fecha BETWEEN ? and ? GROUP BY carrera", [$periodo, $final]);
        $query = DB::select('SELECT MONTH(fecha) AS mes, COUNT(*) "total" from registros WHERE fecha BETWEEN ? and ? GROUP BY MONTH(fecha)', [$periodo,$final]);
        return view('graficas.grph',['grph' => $grph, 'periodo'=>$periodo2,'query'=>$query]);
    }

    public function showEst(){
        if (date("m")>=8) {
            $periodo = date("Y")."-08-01";
            $final = date("Y")."-12-30";
        }else{
            $periodo = date("Y")."-01-01";
            $final = date("Y")."-05-30";
        }

        $grph = DB::select("SELECT carrera, COUNT(*) 'total' from registros where fecha BETWEEN ? and ? GROUP BY carrera",[$periodo,$final]);
        $query = DB::select('SELECT MONTH(fecha) AS mes, COUNT(*) "total" from registros WHERE fecha BETWEEN ? and ? GROUP BY MONTH(fecha)', [$periodo,$final]);
        return response()->json($grph);
    }
}

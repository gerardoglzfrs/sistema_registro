<?php

namespace system_register\Http\Controllers;

use Illuminate\Http\Request;
use system_register\servicio;
use system_register\Hour;
use Carbon\Carbon;
use DB;


class ssController extends Controller
{
    public function registrar(){

        $num_control = $_POST['num_control'];
        $url = "http://167.114.218.98/sistema/services/alumno.php?no_control=".$num_control."";
        $datos = (array)json_decode(file_get_contents($url));

        foreach ($datos as $dato) {
            $no_control = $dato->no_de_control;
            $nombre = $dato->nombre_alumno;
            $ap = $dato->apellido_paterno;
            $am = $dato->apellido_materno;
            $carrera = $dato->nombre_carrera;
            $foto = $dato->foto;

            $url = str_replace("*", "/", $foto);
            $fecha = Carbon::now();

            $Servicio = new servicio();
            $Servicio->foto=$url;
            $Servicio->num_control = $no_control;
            $Servicio->nombre = $nombre;
            $Servicio->ape_p = $ap;
            $Servicio->ape_m =$am;
            $Servicio->carrera = $carrera;
            $Servicio->area = "Recepcion";
            $Servicio->inicio_serv = $fecha->toDateString();
            $Servicio->id = 1;
            $Servicio->save();
        }
    }
    
    public function inicioServ(){
        $num_control = $_POST['num_control'];
        $dato = DB::table('alumnos_servicio')->where('num_control',$num_control)->first();
        //$student = servicio::where('num_control',$num_control)->first();
        return response()->json($dato);
    }

    public function alumnosServ(){
        $fecha = Carbon::now();
        $dato = DB::table('alumnos_servicio')
        ->join('horas_servicio','horas_servicio.num_control','alumnos_servicio.num_control')
        ->where('horas_servicio.fecha',$fecha->toDateString())
        ->select(
            'alumnos_servicio.foto',
            'alumnos_servicio.num_control',
            'alumnos_servicio.nombre',
            'alumnos_servicio.ape_p',
            'alumnos_servicio.ape_m',
            'alumnos_servicio.carrera',
            'horas_servicio.fecha',
            'horas_servicio.hora_ent',
            'horas_servicio.hora_sal'
        )->get();
        return response()->json($dato->toArray());
    }

    public function alumnosReg(){
       $datos = servicio::all();
       return response()->json($datos->toArray());

    }

    public function store(Request $request)
    {
        if(Hour::where('num_control',$request['num_control'])->where('hora_sal',null)->first()){
            $this->update($request['num_control']);
        }else{
            $fecha = Carbon::now();
            $serv = new Hour();
            $serv->num_control = $request['num_control'];
            $serv->fecha = $fecha->toDateString();
            $serv->hora_ent = $fecha->toTimeString();
            $serv->save();
        }
    }

    public function update($num_control){
        $fecha = Carbon::now();
        DB::table('horas_servicio')
        ->where('num_control',$num_control)
        ->where('hora_sal',null)
        ->update(array('hora_sal'=>$fecha->toTimeString()));
    }
}

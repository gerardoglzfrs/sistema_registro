<?php

namespace system_register\Http\Controllers;

use Illuminate\Http\Request;
use system_register\servicio;
use system_register\Hour;
use Carbon\Carbon;
use DB;


class ssController extends Controller
{  
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
            'horas_servicio.hora_sal',
            DB::raw('timediff(horas_servicio.hora_sal,horas_servicio.hora_ent)as total')
        )->get();
        
        return response()->json($dato->toArray());
    }

    public function totalHora(){
        $inicio = DB::table('horas_servicio')->select('hora_ent');
        $fin = DB::table('horas_servicio')->select('hora_sal');

        $total = $inicio->diff($fin)->format('%H:%i:%S');
    }

    public function alumnosReg(){
       //$datos= Student::all();
        //$datos = DB::select('select * from alumnos_servicio');
        $datos = DB::select("SELECT
        alumnos_servicio.foto,
        alumnos_servicio.num_control,
        alumnos_servicio.nombre,
        alumnos_servicio.ape_p,
        alumnos_servicio.ape_m,
        alumnos_servicio.carrera,
        alumnos_servicio.area,
        alumnos_servicio.inicio_serv,
        sum(hour(timediff(horas_servicio.hora_sal,horas_servicio.hora_ent))) AS horas,
        sum(minute(timediff(horas_servicio.hora_sal,horas_servicio.hora_ent))) as minutos
        FROM alumnos_servicio left JOIN horas_servicio ON alumnos_servicio.num_control=horas_servicio.num_control
        group by num_control,foto,nombre,ape_p,ape_m,carrera,area,inicio_serv");
        return response()->json($datos);
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
        ->where('fecha',$fecha->toDateString())
        ->where('hora_sal',null)
        ->update(array('hora_sal'=>$fecha->toTimeString()));
    }

    public function newStudent(){
        $num_control = $_POST['num_control'];
        $url = "http://167.114.218.98/sistema/services/alumno.php?no_control=".$num_control."";
        $datos = (array)json_decode(file_get_contents($url));


        foreach ($datos as $img) {
            $foto = $img->foto;
            $url = str_replace("*", "/", $foto);
        }
        //return response()->json($datos);
        return view('vista_ss.historial_Servicio',['datos'=>$datos, 'img'=>$datos]);
    }

    public function addNew(Request $request){
        $num_control = $_POST['num_control'];
        $url = "http://167.114.218.98/sistema/services/alumno.php?no_control=".$num_control."";
        $datos = (array)json_decode(file_get_contents($url));


        foreach ($datos as $img) {
            $foto = $img->foto;
            $url = str_replace("*", "/", $foto);

            $fecha = Carbon::now();

            $servicio = new servicio();
            $servicio->num_control = $request->num_control;
            $servicio->foto = $url;
            $servicio->nombre = $request->nombre;
            $servicio->ape_p = $request->ape_p;
            $servicio->ape_m = $request->ape_m;
            $servicio->carrera = $request->carrera;
            $servicio->area = 'Recepción';
            $servicio->inicio_serv = $fecha->toDateString();
            $servicio->id = 2;
            $servicio->save();

            return view('vista_ss.historial_Servicio');
            
        }
    }
}

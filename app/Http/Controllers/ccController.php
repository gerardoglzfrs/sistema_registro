<?php

namespace system_register\Http\Controllers;

use Illuminate\Http\Request;
use system_register\Student;
use Carbon\Carbon;

class ccController extends Controller
{
    public function registrar(){
        $num_control = $_POST['num_control'];
        $url = "http://167.114.218.98/sistema/services/alumno.php?no_control=".$num_control."";
        $datos = (array)json_decode(file_get_contents($url));
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
            $student->id = 1;
            $student->save();


        }
    }


    public function showStudents(){
        $students = Student::where('fecha',Carbon::now()->toDateString())->orderBy('hora_ent','desc')->get();
//        $students = Student::all();
        return response()->json($students->toArray());
    }


    public function index()
    {

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

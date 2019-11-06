<?php

namespace system_register\Http\Controllers;

use Illuminate\Http\Request;
use system_register\servicio;


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
            $estatus = $dato->estatus_alumno;
            $foto = $dato->foto;

            $url = str_replace("*", "/", $foto);



            $Servicio = new servicio();
            $Servicio->num_control = $no_control;
            $Servicio->nombre = $nombre;
            $Servicio->ape_p = $ap;
            $Servicio->ape_m =$am;
            $Servicio->carrera = $carrera;
            $Servicio->area = "cc";
            $Servicio->id = 1;
            $Servicio->save();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

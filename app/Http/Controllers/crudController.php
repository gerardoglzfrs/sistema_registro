<?php

namespace system_register\Http\Controllers;

use Illuminate\Http\Request;
use system_register\User;
use Validator;

class crudController extends Controller
{
   
    public function index()
    {
        return view('vista_sa.registrar');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $user = new User();
        $user->area = $request->area;
        $user->tipo_usuario = $request->tipo_usuario;
        $user->nom_usuario = $request->nom_usuario;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['success'=>'Guardado con exito']);
    }

    public function listing(){
        $allUser = User::all();
        return response()->json($allUser->toArray());
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

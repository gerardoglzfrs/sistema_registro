<?php

namespace system_register\Http\Controllers;

use Illuminate\Http\Request;
use system_register\User;
use Validator;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Auth;

class crudController extends Controller
{
   
    public function index()
    {
        return view('vista_sa.registrar');
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
    
    public function edit(Request $request, $id)
    {
        $edit = User::find($id);
        return response()->json($edit);
    }
    public function update(Request $request, $id){
        $contrasena = DB::select("SELECT password FROM users where id = $id");

        $update = User::find($id);
        $update->nom_usuario = $request->get('nom_usuario');
        if($request->get('password')==""){
        }else{
            $update->password = bcrypt($request->get('password'));
        }
        $update->save();
        Session::flash('user_update','El usuario ha sido actualizado');
        return response()->json(['success'=>'actualizado']);
    }
}


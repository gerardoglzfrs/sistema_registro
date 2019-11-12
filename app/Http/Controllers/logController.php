<?php

namespace system_register\Http\Controllers;

use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;
use system_register\Http\Requests\LoginRequest;
use system_register\Http\Controllers\Controller;

class logController extends Controller
{
   
    public function store(LoginRequest $request)
    {

        if(Auth::attempt(['nom_usuario' => $request['username'], 'password' => $request['password']])){
            return redirect('/principal');
        }
        Session::flash('error_user', 'Datos incorrectos');
        return Redirect('/');   

    }
    
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}

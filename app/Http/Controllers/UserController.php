<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function agregar(Request $request)
    {
       
       
        $clave = bcrypt($request->password); 
        $obj = new User();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $clave;
        $obj->fecha_nacimiento =$request->fecha_nacimiento;
        $obj->nation_id = $request->nation_id;
        $obj->sexo = $request->sexo;
        $obj->save();
      
    }
}

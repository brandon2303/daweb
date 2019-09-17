<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usability;

class UsabilityController extends Controller
{
    public function store(Request $request)
    {

       $this->validate($request, [
           'name' => 'required|alpha',
           'email' => 'required|email',
           'phone' => 'required|numeric',
           'r_phone_call' => 'required',
           'website' => 'required',
           'priority' => 'required',
           'type' => 'required',
           'message' => 'required',
       ], [
            'name.required' =>'El campo nombre es requerido',
            'email.required' =>'El campo email es requerido',
            'phone.required' =>'El campo telefono es requerido',
            'r_phone_call.required' =>'El campo regresar la llamada es requerido',
            'website.required' =>'El campo website es requerido',
            'priority.required' =>'El campo prioridad es requerido',
            'type.required' =>'El campo tipo de servicio es requerido',
            'message.required' =>'El campo mensaje es requerido',
            'name.alpha' => 'El nombre solo puede contener letras.',
            'phone.numeric' => 'El telefono solo puede contener numeros.'
            
       ]);

        $obj = new Usability();
       
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->r_phone_call = $request->r_phone_call;
        $obj->website = $request->website;
        $obj->priority = $request->priority;
        $obj->type = $request->type;
        $obj->message = $request->message;
       
        $obj->save();
     
    }

    protected static function checkEmail(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        
        $res = Usability::checkEmailM($request->email);
        
        if(!$res)
            return response()->json(false);
        else
            return response()->json(true); 

    }

    protected static function checkName(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        
        $res = Usability::checkNameM($request->name);
        
        if(!$res)
            return response()->json(false);
        else
            return response()->json(true); 

    }
 
}

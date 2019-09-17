<?php

namespace App\Http\Controllers;

use App\Casa;
use Illuminate\Http\Request;

class ControllerCasas extends Controller
{
    protected function listar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        return $r = Casa::listarModel();
    }

    protected function agregar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $imagen = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload'), $imagen);

        $array = array('nombre' => $request->nombre,
                       'direccion' => $request->direccion,
                       'cuartos' =>  $request->cuartos, 
                       'mts_construc' => $request->mts_construc, 
                       'mts_terreno' => $request->mts_terreno, 
                       'plantas' => $request->plantas,
                       'fecha' => $request->fecha,
                       'costo' => $request->costo,
                       'giro_id' => $request->giro_id,
                       'imagen' => $imagen);
                           
        Casa::agregarModel($array);
    }

    protected function eliminar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        Casa::eliminarModel($request->id);
    }

    protected function editar(Request $request)
    {
        if($request->file != "null")
        {  
            $imagen = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('upload'), $imagen);

            $array = array(
                'id' => $request->id,
                'nombre' => $request->nombre,
                'direccion' => $request->direccion,
                'cuartos' =>  $request->cuartos, 
                'mts_construc' => $request->mts_construc, 
                'mts_terreno' => $request->mts_terreno, 
                'plantas' => $request->plantas,
                'fecha' => $request->fecha,
                'costo' => $request->costo,
                'giro_id' => 1,
                'imagen' => $imagen);

            Casa::editarModel2($array);  
        }
       else
            Casa::editarModel($request->id, $request->all()); 
    }
}

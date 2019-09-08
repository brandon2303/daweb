<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use App\File;
use Carbon\Carbon;

class FileController extends Controller
{
    public function formSubmit(Request $request)
    {
        $extencion = $request->file->getClientOriginalExtension();
        $type = $this->getType($extencion);
    
        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload'), $fileName);
        
        $fecha = Carbon::now('America/Phoenix');
    
        $fecha2 = $fecha->format('Y-m-d',$fecha);
        $tiempo = $fecha->format('H:i:s',$fecha);

        $obj = new File();
        $obj->nombre = $fileName;
        $obj->tipo = $type;
        $obj->extencion = $extencion;
        $obj->fecha = $fecha2;
        $obj->tiempo = $tiempo;
        $obj->save();
     
    }
    public function editar(Request $request)
    {
        $obj = File::find($request->id);
        $obj->nombre = $request->nombre;
        $obj->save();
    }
    public function getType($extencion)
    {
        if($extencion == "avi" || $extencion == "wmv" || $extencion == "mp4")
            return "Video";
        else
        if($extencion == "jpg" || $extencion == "png")
            return "Imagen";
        else
        if($extencion == "docx" || $extencion == "xlsx" || $extencion == "csv" || $extencion == "pptx" || $extencion == "txt" || $extencion == "pdf" )
            return "Documento";
        else
        if($extencion == "mp3" || $extencion == "wav")
            return "Audio"; 
    }

    public static function listar()
    {   
        return $r = File::all();
    }

    public function eliminar(Request $request)
    {
        $id = $request->id;  
        File::destroy($id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use App\File;

class FileController extends Controller
{
    public function formSubmit(Request $request)
    {
        $extencion = $request->file->getClientOriginalExtension();
        $type = $this->getType($extencion);
    
        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload'), $fileName);
              
        return response()->json(['success'=>'You have successfully upload file.']);
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
/* 
    public function getType($extencion)
    {
        dd($extencion);
        die();
    } */
}

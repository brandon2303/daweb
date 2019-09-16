<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    protected $fillable = ['nombre','direccion','cuartos','mts_construc','mts_terreno','plantas','fecha','costo','giro_id','imagen'];

    protected static function listarModel()
    {
        return self::all();
    }
    protected static function agregarModel($array)
    {
        Casa::create($array);
    }
    protected static function eliminarModel($id)
    {
        Casa::destroy($id);
    }
    protected static function editarModel($id, $array)
    {
        $obj = Casa::find($id);
        $obj->update($array);
    }
}

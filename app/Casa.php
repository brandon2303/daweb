<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    
    protected $fillable = ['nombre','direccion','cuartos','mts_construc','mts_terreno','plantas','fecha',
                            'costo','giro_id','imagen',
                            'giros.id, giros.nombre as nombre_giro,',
                            'casas.id','casas.nombre','casas.direccion','casas.cuartos','casas.mts_construc','casas.mts_terreno','casas.plantas','casas.fecha',
                            'casas.costo','casas.giro_id','casas.imagen',
                           ];
    public function giro()
    {
        return $this->belongsTo('App\Giro'); 
    }
    protected static function listarModel()
    {
        return self::join('giros','casas.giro_id','=','giros.id')
        ->select('casas.id','casas.nombre','casas.direccion','casas.cuartos','giros.nombre as nombre_giro',
                 'casas.mts_construc','casas.mts_terreno','casas.plantas','casas.fecha',
                 'casas.costo','casas.giro_id','casas.imagen')
        ->orderBy('casas.id','desc')->get();
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

    protected static function editarModel2($array)
    {
        $obj = Casa::find($array["id"]);
        $obj->update($array);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giro extends Model
{
    protected static function listarModel()
    {
        return self::all();
    }
    public function casas()
	{
		return $this->hasMany('App\Casa');
	}
}

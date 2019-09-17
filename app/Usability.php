<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usability extends Model
{
    
    protected $table = 'usabilities';

    protected $fillable = [
        'name', 'email', 'phone_call','website','priority','type','message'
    ];

    protected static function checkEmailM($email)
    {
        return self::select('email')->where('email', $email)->first();
    }

    protected static function checkNameM($name)
    {
        return self::select('name')->where('name', $name)->first();
    }
}

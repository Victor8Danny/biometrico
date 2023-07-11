<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tfotopersona';
    protected $primaryKey = 'codfoto';
    protected $fillable = ['codfoto', 'codpersona','nomfoto'];

    public static function datosFoto($codpersona) 
    {
        return Foto::where('codpersona', '=', $codpersona)->first();
    }
}

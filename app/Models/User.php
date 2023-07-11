<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Foto;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;



class User extends Authenticatable
{
    use Notifiable;
    //use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'tpersona';
    protected $primaryKey = 'codpersona';
    protected $fillable = [
        'codpersona','cedpersona', 'apepersona', 'nompersona', 'corpersona',
        'telconvencionalpersona', 'telcelularpersona', 'sexo', 'tippersona', 'huella', 'clave', 'doc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'clave',
        //'remember_token',
    ];

    public static function datosFoto() 
    {
        $id = Auth::id();
        return Foto::where('codpersona', '=', $id)->first();
    }

}

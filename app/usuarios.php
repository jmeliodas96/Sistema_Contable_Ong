<?php

namespace siscontable;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    
    protected $table="usuarios"

    protected $primaryKey="id_usuario"

    public $timestamp=false;

    protected $fillable{

    		'nombre_usuario',
    		'contraseña'

    }


}

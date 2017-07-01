<?php

namespace siscontable;

use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    protected $table='proyecto';
	
	protected $primaryKey='id_proyecto';
	
	public $timestamps=false;

	// un arreglo con los campos que reciben valores y son asignados al modelo
	protected $fillable =[
		'nombre',
		'presupuesto',
		'fecha_ini',
		'fecha_fin'		
	]; 


}
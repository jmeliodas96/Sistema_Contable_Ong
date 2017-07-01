<?php

namespace siscontable\Http\Controllers;

use Illuminate\Http\Request;
use siscontable\proyecto;
use Illuminate\Support\Facades\Redirect;
use siscontrol\Http\Requests\ProyectoFormRequest;
use DB;



class ProyectoController extends Controller
{
    public function __construct()
	{

	}
	public function index(Request $request)
	{
		if($request)//si se ha creado el archivo request
		{
			$query=trim($request->get('searchText'));
			$proyecto=DB::table('proyecto')->where('nombre','LIKE','%'.$query.'%')
			->orderBy ('id_proyecto','desc')
			->paginate(3);

			return view('proyecto.index',["proyecto"=>$proyecto, "searchText"=>$query]);

		}	/*retornamos a la vista GestionesDiarias.actividades.index todas las actividades en un parametro llamado actividades 
			y el texto de busqueda en parametro llamado searchText */
			//return view('gestiones.actividades.index'.["actividades"=>$actividades,"searchText"=>$query]);		}
	}
	
	//El metodo create va a retornar la vista GestionDiarias.actividades
	public function create()
	{
		//debemos de crear el archivo create.php
		return view("proyecto.create");
	}
	
	// El metodo store lo que hace es almacenar el modelo del objeto actividades en nuestra tabla actividades de nuestra base de datos
	public function store (ProyectoFormRequest $request)
	{
		$proyecto = new proyecto;
		$proyecto->nombre=$request->get('nombre');
		$proyecto->presupuesto=$request->get('presupuesto');
		$proyecto->fecha_ini=$request->get('fecha_ini');
		$proyecto->fecha_fin=$request->get('fecha_fin');
		$proyecto->save(); //almacenamos las actividades
		
		return Redirect::to('proyecto');
	}
	

	// El metodo show recive un parametro de la actividad(id_acti)
	public function show($id)
	{
		return view("proyecto.show", ["proyecto"=>proyecto::findOrFail($id)]);
	}
	
	public function edit($id)
	{
		return view("proyecto.edit",["proyecto"=>proyecto::findOrFail($id)]);

	}

	// El metodo update recive un objeto de tipo request, el cual nos permite modificar el objeto de la tabla seleccionado
	public function update(ProyectoFormRequest $request, $id)
	{ 

		// aqui quede modificando el proyecto, siempre tengo que arrancar desde la cmd el php artisan serve
		//tambien a xampp, en el video quede en el minuto 20:38
		$proyecto=proyecto::findOrFail($id); //reciv: el id del proyecto que quiero modificar
		$proyecto->nombre = $request->get('nombre');
		$proyecto->presupuesto = $request->get('presupuesto');
		$proyecto->fecha_ini = $request->get('fecha_ini');
		$proyecto->fecha_fin = $request->get('fecha_fin');
		$proyecto->update(); //llamo al metodo update para actualizar

		return Redirect::to('proyecto'); 

	}

	// El metodo destroy, igual recive el id de la actividad que se desea cambiar de condicion
	public function destroy($id)
	{

		proyecto::destroy($id);
		return Redirect::to('proyecto');
	}


}

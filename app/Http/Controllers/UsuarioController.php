<?php

namespace siscontable\Http\Controllers;

use Illuminate\Http\Request;
use siscontable\usuario;
use Illuminate\Support\Facades\Redirect;
use siscontrol\Http\Requests\UsuariosFormRequest;
use DB;


class UsuarioController extends Controller
{
    

    public function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) 
        {
            $query=trim($request->get('searchText'));
            $usuario=DB::table('usuarios')
            ->where('nombre_usuario','LIKE','%'.$query.'%')
            ->orderBy('id_usuario','desc')
            ->paginate(7); 
        

            return view('usuario.index',["usuario"=>$usuario,"searchText"=>$query]);
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
        //dd($_POST);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosFormRequest $request)
    {
        $usuario = new usuarios;
        $usuario->nombre_usuario=$request->get('nombre_usuario');
        $usuario->contraseña=$request->get('contraseña');
        $usuario->save();

        return Redirect::to('usuario');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usuario.show',["usuario"=>usuarios::findorFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('usuario.edit',["usuario"=>usuarios::findorFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $usuario = new usuarios;
        $usuario->nombre_usuario=$request->get('nombre_usuario');
        $usuario->contraseña=$request->get('contraseña');
        $usuario->update();

        return Redirect::to('usuario');
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //DB::delete('delete from usuario where id_usuario = ?',[$id]);
        $usuario=usuarios::findorFail($id);
        $usuario->update();
        
        return Redirect::to('usuario');
        //
    }
}

@extends('layouts.admin')
@section('contenido')
<!--inicio de Contenido primario -->
<div class="container-fluid">
	<div class="page-header">
		 <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios <small>administrador</small></h1>
	</div>
	<p class="lead">Bienvenido señor administrador a la lista de usuarios en la cual podra realizar el mantenimiento requerido a sus usuarios activos</p>
</div>
<!--fin de contenido primario-->

<!--inicio de del tab navigator, se le brinda al usuario la opcion de navegar entre la lista de los usuarios y agregar-->
<ul class="nav nav-tabs" style="margin-bottom: 15px;">
	<li class="active"><a href="#nuevo" data-toggle="tab">Nuevo Usuario</a></li>
	<li><a href="#lista" data-toggle="tab">Lista De Usuarios</a></li>
</ul>
<!--fin del tab navigator-->
					
<!--inicio de contenido secundario-->
<div id="myTabContent" class="tab-content">
	<!--muestra el formulario para agregar un nuevo usuario-->			
	<div class="tab-pane fade active in" id="nuevo">		
		<div class="container-fluid">								
			<div class="row">										
				<div class="col-xs-12 col-md-10 col-md-offset-1">
					<form  action="('UsuarioController@create',$usuario->id_usuario)"  method="POST" autocomplete="off">
						<div class="form-group label-floating">
							<label class="control-label" for="nombre_usuario">Nombre De Usuario</label>
							<input class="form-control" name="nombre_usuario" type="text">
						</div>
						<div class="form-group label-floating">
							<label class="control-label" for="contraseña">Contraseña</label>
							<input class="form-control" name="contraseña" type="text">
						</div>
						<p class="text-center">
							<button href="#!" class="btn btn-info btn-raised btn-sm" type="submit"><i class="zmdi zmdi-floppy"></i> Guardar</button>
						</p>
					</form>
				</div>
			</div>	
		</div>
	</div>
	<!--fin del formulario nuevo usuario-->			
		
	<!-- muestra la lista de usuarios-->
		<div class="tab-pane fade" id="lista">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">Id</th>
							<th class="text-center">Nombre de Usuario</th>
							<th class="text-center">Contraseña</th>
							<th class="text-center">Actualizar</th>
							<th class="text-center">Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($usuario as $user)	
							<tr>
								<td>{{$user->id_usuario}}</td>
								<td>{{$user->nombre_usuario}}</td>
								<td>{{$user->contraseña}}</td>
								<td>
									<a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a>
								</td>
								<td>
									<a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a>											
								</td>
							</tr>
						@endforeach	
					</tbody>
				</table>
			</div>
			{{$usuario->render()}} <!--agrega la paginación-->
		</div>
</div>
<!--fin de contenido secundario-->
@endsection
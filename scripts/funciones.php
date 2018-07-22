<?php 
	
	$conexion = null;

	function conectar(){
		global $conexion;
		$conexion =  mysqli_connect('localhost','root','','intranet');	
		mysqli_set_charset($conexion, 'utf8');
	}
	
	function getTodasCategorias(){
		global $conexion;
		$respuesta = mysqli_query($conexion,"SELECT * FROM categorias");	
		
		return $respuesta->fetch_all();
	}

	function getUsuarios(){
		global $conexion;
		$respuesta = mysqli_query($conexion,"SELECT  * FROM  usuarios WHERE admin<>1");	

			return $respuesta->fetch_all();

	}
	function  getCategoriasPorUser(){
		global $conexion;
		$respuesta = mysqli_query($conexion,"SELECT  c.categoria, c.descripcion, c.ruta FROM permisos P INNER JOIN categorias C ON P.ID_categoria = c.ID_categoria WHERE usuario='".$_SESSION['usuario']."'");	

			return $respuesta->fetch_all();
	}


	function validarLogin($usuario,$clave){
		global $conexion;
		$consulta = "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'";
		$respuesta = mysqli_query($conexion,$consulta);

		if($fila =  mysqli_fetch_row($respuesta)){
			session_start();
			$_SESSION['usuario'] = $usuario;
			$_SESSION['admin'] = $fila[2];
			return true;
		}

		return false;
	}

	function eliminarPermisos($usuario){
	    global $conexion;
		mysqli_query($conexion,"DELETE FROM permisos WHERE usuario='".$usuario."'");	
	}

	function tienePermisos($usuario, $idCat){
		global $conexion;
		$result = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM permisos WHERE usuario='".$usuario."' AND ID_Categoria=".$idCat);
		$row = mysqli_fetch_assoc($result);
		$numero = $row['total'];
		return $numero > 0;
	}

	function asignarPermisos($usuario, $idCat){
	    global $conexion;
		mysqli_query($conexion,"INSERT INTO permisos VALUES('".$usuario."',".$idCat.")");			
	}

    function sesionIniciada(){
    	session_start();
		return isset($_SESSION['usuario']);
	}

	function esAdmin(){
		return $_SESSION['admin'];

	}

	function desconectar(){
		global $conexion;
		mysqli_close($conexion);
	}



 ?>
<?php 
	
	$conexion = null;

	function conectar(){
		global $conexion;
		$conexion =  mysqli_connect('localhost','root','','intranet');	
		mysqli_set_charset($conexion, 'utf8');
	}
	
	function getCategorias(){
		global $conexion;
		$respuesta = mysqli_query($conexion,"SELECT * FROM categorias");	
		
		return $respuesta->fetch_all();
	}

	function validarLogin($usuario,$clave){
		global $conexion;
		$consulta = "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'";
		$respuesta = mysqli_query($conexion,$consulta);

		if($fila =  mysqli_fetch_row($respuesta)){
			session_start();
			$_SESSION['usuario'] = $usuario;
			return true;
		}

		return false;
	}

    function sesionIniciada(){
    	session_start();
		return isset($_SESSION['usuario']);
	}

	function desconectar(){
		global $conexion;
		mysqli_close($conexion);
	}



 ?>
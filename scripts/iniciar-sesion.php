<?php 
	require 'funciones.php';

	$usuario = $_POST['txtUsuario'];
	$clave = $_POST['txtClave'];
	
	conectar();
	if (validarLogin($usuario,$clave)){
		 header('Location:../panelUsuario.php');
	}else{

 ?>
 	<script>
 	alert('Los datos ingresados son incorrectos.')
 		location.href="../index.html";
 	</script>

 <?php
  desconectar();
}

 ?>
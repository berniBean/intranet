<?php 
	$conexion =  mysqli_connect('localhost','root','','intranet');
	$respuesta = mysqli_query($conexion,"SELECT * FROM categorias");

	

	while($fila=mysqli_fetch_row($respuesta))
	echo "Primer valor de la primera fila: " . $fila[0] . " " . $fila[1] . " " . $fila[2] . " " . $fila[3];
 ?>
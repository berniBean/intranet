<?php
  require 'funciones.php';
  

  if(!sesionIniciada() || !esAdmin()){
     header('Location: index.html');
  }


  if(isset( $_POST['txtUsuario']))
  $usuario = $_POST['txtUsuario'];
  else  header('Location: index.php');


  
  conectar();
  eliminarPermisos($usuario);
  $categorias = getTodasCategorias();

  //Reasignar Permisos
  foreach ($categorias as $categoria ):
    if (isset($_POST['categoria'. $categoria[0]]))
      asignarPermisos($usuario,$categoria[0]);
  endforeach;

   header('Location: ../admin/editarPermisos.php?usuario='.$usuario);

  desconectar();

?>
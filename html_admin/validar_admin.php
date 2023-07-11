<?php
include('db_admin.php');
$nombre=$_POST['nombre'];
$contrasena=$_POST['contrasena'];



$consulta= "INSERT INTO usuarios (id, nombre, contrasena) VALUES(0,'$nombre','$contrasena')";
$resultado=mysqli_query($conexion,$consulta);


if(isset($_POST['agregar'])){
  $query = "INSERT INTO usuarios (id, nombre,  contrasena) VALUES(0,'$nombre','$contrasena')";
  $sql = mysqli_query($conexion, $query);
  
  if($sql){
      header("location: ../html_admin/mostrar_usuarios.php");
  } 
}else if(isset($_POST['agregarAdmin'])){
  $query = "INSERT INTO administradores (id, nombre,  contrasena) VALUES(0,'$nombre','$contrasena')";
  $sql = mysqli_query($conexion, $query);
  
  if($sql){
      header("location: ../html_admin/mostrar_usuarios.php");
  } 
}else if(isset($_POST['modificar'])){
  $idBuscar = $_POST['id'];
  $consulta = $conexion -> query("UPDATE usuarios
                              SET nombre = '$nombre',
                                  contrasena = '$contrasena'
                              WHERE id = '$idBuscar'");
  if($consulta){
      header("location: ../html_admin/mostrar_usuarios.php");
  }
}else if(isset($_POST['eliminar'])){
  $idBuscar = $_POST['id'];
  $consulta = $conexion -> query("DELETE FROM usuarios WHERE id = '$idBuscar'");
  if($consulta){
      header("location: ../html_admin/mostrar_usuarios.php");
  }
}
?>
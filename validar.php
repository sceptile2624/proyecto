<?php
include('conexion.php');
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];



$consulta= "SELECT id, nombre, contrasena, correo, direccion, cp FROM usuarios";
$resultado=mysqli_query($conexion,$consulta);

$entrar = mysqli_num_rows($resultado);


if($entrar > 0){
  
    header("location:../html_usuarios/productos_usuarios.php?user=$correo");
    exit;

}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
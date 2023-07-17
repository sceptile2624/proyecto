<?php
     include "db_admin.php";

     $producto = $_POST['producto'];
     $precio = $_POST['precio'];
     $fechaingreso = $_POST['fechaingreso'];
     $url_img = $_POST['imagenUrl'];
 
     $query = "INSERT INTO productos (id, producto, precio, fechaingreso, url_img) VALUES(0,'$producto','$precio','$fechaingreso', '$url_img')";
     $sql = mysqli_query($conexion, $query);
     
     if($sql){
         header("location: ../proyecto/html_admin/productos_admin.php");
     }else{
         echo "producto no agregado";
     }
?>
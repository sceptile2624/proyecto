<?php 

include("db_productos.php");

if (isset($_POST['producto'])) {
    if (strlen($_POST['producto']) >= 1 && strlen($_POST['precio']) >= 1) {
	    $producto = trim($_POST['producto']);
	    $precio = trim($_POST['precio']);
	    $fechaingreso= date("d/m/y");
	    $consulta = "INSERT INTO productos(producto, precio, fechaingreso) VALUES (0, '$producto','$precio','$fechaingreso')";
	    $resultado = mysqli_query($conexion,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Se ha registradp correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

?>
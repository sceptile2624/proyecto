
<?php 
$inc = include("conexion.php");
if ($inc) {
	$consulta = "SELECT * FROM usuarios";
	$resultado = mysqli_query($conexion,$consulta);
	if ($resultado) {
		while ($row = $resultado->fetch_array()) {
	    $id = $row['id'];
	    $nombre = $row['nombre'];
	    $contrasena = $row['contrasena'];
	    ?>
        <div>
        	<h2><?php echo $nombre; ?></h2>
        	<div>
        		<p>
        			<b>ID: </b> <?php $id ?><br>
        		    <b>contraseña: </b> <?php $contrasena ?><br>
        		  
        		</p>
        	</div>
        </div> 
	    <?php
	    }
	}
}
?>
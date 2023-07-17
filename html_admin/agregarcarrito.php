<?php
    include 'db_admin.php';

    $a = $_GET["var"];
    $user = $_GET["user"];
    $id;
    $titulo;
    $precio;
    $url_img;

    $select = $conexion -> query("SELECT id, producto, precio, url_img FROM productos WHERE id = '$a'");
    if($select -> num_rows>0){
        while($row = $select ->fetch_assoc()){
            $id  = $row["id"];
            $titulo = $row["producto"];
            $precio = $row["precio"];
            $url_img = $row["url_img"];
        }
    }

    $insert = $conexion->query("INSERT INTO carrito (id, id_producto, nombre_producto, url_img, precio)
                            VALUES (0, '$id', '$titulo', '$url_img', '$precio')");
    if($insert){
        header("location: ../proyecto/html_usuarios/productos_usuarios.php?user=$user");
    }
?>
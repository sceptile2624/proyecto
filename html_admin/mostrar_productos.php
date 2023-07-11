<?php 
    include 'db_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicio Admin</title>
</head>
<body >

<header class="header">
          <nav class="nav">
            <a href="../html_admin/productos_admin.php" class="logo nav-link">LCLP</a>
            <button class="nav-toggle" aria-keyshortcuts="Abrir menú">
              <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu">
              <li class="nav-menu-item">
                <a href="../html_admin/mostrar_usuarios.php" class="nav-menu-link nav-link">Editar usuarios</a>
              </li>
              <li class="nav-menu-item">
                <a href="../PHP/productos.php" class="nav-menu-link nav-link">Productos</a>
              </li>
              <li class="nav-menu-item">
                <a href="#" class="nav-menu-link nav-link nav-menu-link_active"
                  >Contacto</a>
              </li>
            </ul>
          </nav>
        </header>
        

    <div class="fondo-titulo-alterado">
        <!--form agregar Producto-->
        <div class="caja">
            <form action="../html_admin/productos.php" method="post">
                <div class="cont">
                    <h2 class="cont-titulo">Agregar Producto</h2>
                    <label for="titulo" class="cont-label">producto:  </label>
                    <input class="cont-input" type="text" name="producto" id="titulo">
                    
                    <label for="precio" class="cont-label">Precio:  </label>
                    <input class="cont-input" type="number" name="precio" id="precio">
                    

                    <label for="imagen" class="cont-label">URL Imagen:    </label>
                    <input class="cont-input" type="file" name="imagenUrl" id="imagenUrl" style="color:white" >
                </div>
                
                <input class="cont-boton" type="submit" id="enviar" value="Agregar" >
            </form>
        </div>
        <!--Form de busqueda-->
        <div class="caja">
            <form action="" method="get">
                <div class="cont">
                    <h2 class="cont-titulo">Buscar Producto</h2>

                    <input type="text" placeholder="Buscar" name="buscar" id="buscar" class="cont-input">
                    <input type="submit" name="enviar" value="Buscar" class="cont-boton">

                    <?php
                        if(isset($_GET['enviar'])){
                            $buscar = $_GET['buscar'];

                            $consulta = $conexion -> query("SELECT * FROM productos 
                                                            WHERE id='$buscar' 
                                                                or producto ='$buscar' 
                                                                or precio='$buscar'");
                            if($consulta -> num_rows > 0){
                    ?>
                                <table style="background-color: white;">
                                    <tr>
                                        <th>Id</th>
                                        <th>producto</th>
                                        <th>Precio</th>
                                    </tr>
                                    <?php
                                        while($row = $consulta ->fetch_assoc()){
                                            echo "<tr>";
                                                echo "<td>".$row["id"]."</td>";
                                                echo "<td>".$row["producto"]."</td>"; 
                                                echo "<td>".$row["precio"]."</td>"; 
                                            echo "</tr>";
                                        }
                                    
                                echo "</table>";
                            }
                        }
                    ?>
                </div>
            </form>
        </div>
    <!--FORM ELIMINAR-->
        <div class="caja">
            <form action="" method="get">
                <div class="cont">
                    <h2 class="cont-titulo">Eliminar Productos</h2>
                    <input type="text" placeholder="Ingrese el Id" class="cont-input" name="buscar">
                    <input type="submit" value="Eliminar" name="eliminar" class="cont-boton">

                    <?php
                        if(isset($_GET['eliminar'])){
                            $buscar = $_GET['buscar'];
                            $consulta = $conexion -> query("DELETE FROM productos WHERE id = '$buscar'");
                            
                            //header("location: ../html_admin/mostrar_productos.php"); 
                        }
                    ?>
                </div>
            </form>
        </div>
    <!--FORM MODIFICAR-->
        <div class="caja">
            <form action="modificar_Productos.php" method="post">
                <div class="cont">
                    <h2 class="cont-titulo">Modificar Producto</h2>
                    <p style="color: white;">*Indique mediante el id el producto a modificar*</p>
                    <input type="text" class="cont-input" placeholder="id"      name="id">
                    <input type="text" class="cont-input" placeholder="producto"  name="producto">
                    <input type="text" class="cont-input" placeholder="Precio"  name="precio">
                    <input type="file" class="cont-input" placeholder="URL"     name="url_img" style="color: white;">
                    <input type="submit" class="cont-boton" value="Modificar" name="modificar">
                </div>
            </form>
        </div>
    <!--Table Ver producto-->
        <div class="caja">
            <div class="cont">
                <h2 class="cont-titulo">Productos</h2>
                <table style="background-color: white;">
                    <thead>
                        <th>Id</th>
                        <th>producto</th>
                        <th>Precio</th>
                        <th>IMG</th>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT id, producto, precio, url_img FROM productos";
                            $result = $conexion -> query($query);
    
                            if($result -> num_rows > 0){
                                while($row = $result -> fetch_assoc()){
                                    echo "<tr>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['producto']."</td>";
                                        echo "<td>".$row['precio']."</td>";
                                        echo "<td><img src='../IMG/".$row['url_img']."' alt='Imagen del Producto' width='100' height='100'></td>";                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</body>
</html>
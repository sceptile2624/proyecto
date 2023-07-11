<?php 
    include 'db_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/estiloAdmin.css">
    <title>Administrar usuarios</title>
    <style>
        .cont{
            display: flex;
        }
        .cont-titulo{
            color: black;
        }
        #datos{
            width: 20%;
            padding: 1rem;
        }
        #datos label, input{
            display: block;
        }
        #usuarios{
            padding: 1rem;
        }
        table{
            border: 1px solid black;
            border-collapse: collapse;
        }
        tr:hover{
            background-color: #e0e0e0;
            cursor: pointer;
        }
        
    </style>
</head>
<body style="background-color: white;">
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
    <div class="cont">
        <div id="datos">
            <h2 class="cont-titulo">Datos</h2>
            <form action="validar_admin.php" method="post">

                <label for="">ID</label>
                <input type="text" name="id">

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">

                <label for="nombre">contrasena</label>
                <input type="text" name="contrasena">

                <label for="correo">Email</label>
                <input type="text" name="correo">

                <label for="direccion">direccion</label>
                <input type="text" name="direccion">

                <label for="cp">CP</label>
                <input type="text" name="cp">

                
                
                <input type="submit" value="Agregar"    name="agregarAdmin">
                <input type="submit" value="Modificar"  name="modificar">
                <input type="submit" value="Eliminar"   name="eliminar">

            
                
            </form>
        </div>
        <div id="usuarios">
            <h2 class="cont-titulo">Usuarios</h2>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Contraseña</th>
                        <th>correo</th>
                        <th>direccion</th>
                        <th>codigo postal</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT id, nombre, contrasena, correo, direccion, cp FROM usuarios";
                    $result = $conexion -> query($query);

                    if($result -> num_rows > 0){
                        while ($row = $result ->fetch_assoc()){
                            echo "<tr>";
                                echo "<td>".$row["id"]."</td>";
                                echo "<td>".$row["nombre"]."</td>"; 
                                echo "<td>".$row["contrasena"]."</td>"; 
                                echo "<td>".$row["correo"]."</td>";
                                echo "<td>".$row["direccion"]."</td>";
                                echo "<td>".$row["cp"]."</td>";
                                echo "</tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
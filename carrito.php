<?php include 'conexion.php';
$user = $_GET['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="CSS_usuarios/productos_usuario.css">
    <link rel="stylesheet" href="CSS/navbar.css">

</head>
<body>
<header class="header">
            <nav class="nav">
              <a href="/pryecto/html_usuarios/main.html" class="logo nav-link">LCLP</a>
              <button class="nav-toggle" aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
              </button>
              <ul class="nav-menu">
                <li class="nav-menu-item">
                  <a href="../carrito.php" class="nav-menu-link nav-link">carrito</a>
                </li>
                <li class="nav-menu-item">
                  <a href="Registro.html" class="nav-menu-link nav-link">Registrar</a>
                </li>
                <li class="nav-menu-item">
                  <a href="ubicacion.html" class="nav-menu-link nav-link">Ubicacion</a>
                </li>
                <li class="nav-menu-item">
                  <a href="" class="nav-menu-link nav-link">Sobre nosotro</a>
                </li>
                <li class="nav-menu-item">
                  <a href="#" class="nav-menu-link nav-link nav-menu-link_active"
                    >Contacto</a
                  >
                </li>
              </ul>
            </nav>
          </header>
    <section>
        <h1>Carrito de compras</h1>
    </section>


    <section style="background-color: white;">
    <table style="width: 80%;">
        <thead>
            <th>Id</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Foto</th>
            <th>Comprar</th>
        </thead>
        <tbody>
            <?php
            $query = "SELECT id_producto, nombre_producto, precio, url_img FROM carrito";
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_producto"] . "</td>";
                    echo "<td>" . $row["nombre_producto"] . "</td>";
                    echo "<td>" . $row["precio"] . "</td>";
                    echo "<td><img src='IMG/" . $row["url_img"] . "' alt='img' width='100' height='100'></td>";
                    echo "<td><form action='EnviarMensaje.php' method='get'>
                    <input type='hidden' name='id' value='" . $row["id_producto"] . "'>
                  </form></td>";
            
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <?php
    echo '<form action="generarpdf.php?user='.$user.'" method="post">';
    echo '<input type="submit" value="Comprar">';
    echo '</form>';
    ?>
    
            
    
</section>
    <footer>
        <div class="footer-contain mision-vision_content">
            <div class="social-media">
                <h2 class="blanco">Hola: </h2>
                <ul>
                    <li><a href="#"><img src="https://cdn.icon-icons.com/icons2/1293/PNG/96/2363208-app-chat-discord-game-gamer-social_85471.png" alt=""></a></li>
                    <li><a href="#"><img src="https://cdn.icon-icons.com/icons2/1753/PNG/96/iconfinder-social-media-applications-3instagram-4102579_113804.png" alt=""></a></li>
                    <li><a href="#"><img src="https://cdn.icon-icons.com/icons2/836/PNG/96/Facebook_icon-icons.com_66805.png" alt=""></a></li>
                    <li><a href="#"><img src="https://cdn.icon-icons.com/icons2/1211/PNG/96/1491579583-yumminkysocialmedia02_83111.png" alt=""></a></li>
                
                </ul>
            </div>
            <p class="blanco">
                Esta es la lista de lo agregado en tu carrito
                <br>
            </p>
        </div>
    </footer>
</body>
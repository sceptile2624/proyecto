<?php 
    include '../html_admin/db_admin.php';
    $user = $_GET['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Le cortamos los pelos</title>
        <link rel="stylesheet" href="../CSS_usuarios/productos_usuarios.css">
        <link rel="stylesheet" href="../CSS/navbar.css">

    </head>
    <body>

    <style>
        .contenedor{
          opacity: value;
            margin: 2rem 2rem;
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .tarjeta{
            width: 250px;
            margin: 20px;
            padding: 0px;
            border-radius: 0px;
            background-color: white;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        }
        .icon{
            margin: -50px 0px 0px 5px;
            background-color: white;
            border-radius: 50%;
        }
        .icon:hover{
            background-color: whitesmoke;
        }
        .titulo{
            font-size: 2rem;
            text-align: center;
            margin: 0rem 0rem 1rem 0rem;
        }
        .descripcion, .precio{
            font-size: 1rem;
            margin: 1rem 1rem;
        }
        .precio{
            font-size: 2rem;
            color: purple;
        }
        .precio::before{
            content: "$";
        }
        .cont{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .tarjeta-icons{
            display: flex;
            justify-content: space-between;
        }


        .tarjeta {
    margin: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.image-container {
    position: relative;
    width: 100px;
    height: 100px;
}

.mini-button {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('/IMG/carrito.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: 50%;
    opacity: 0.5;
    z-index: 1;
}

.mini-button:hover {
    opacity: 1;
}


    </style>
        
        <h1 class="title">   Bienvenido, ELIJE TU ESTILO</h1>

        <header class="header">
            <nav class="nav">
                <?php 
                echo '<a href="../html_usuarios/main.html?user='.$user.'" class="logo nav-link">LCLP</a>';
                ?>
              
              <button class="nav-toggle" aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
              </button>
              <ul class="nav-menu">
                <li class="nav-menu-item">
                    <?php
                    echo '<a href="../carrito.php?user='.$user.'" class="nav-menu-link nav-link">carrito</a>';
                    ?>
                  
                </li>

                
                <li class="nav-menu-item">
                  <a href="../sesion.html" class="nav-menu-link nav-link nav-menu-link_active">cerrar sesion</a>
                </li>
              </ul>
            </nav>
          </header>
    
          <div class="contenedor">
    

          <?php
    $query = "SELECT id, producto, precio, url_img FROM productos";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='tarjeta'>";
            echo "<div class='cont'>";
            echo "<p class='titulo'>" . $row["producto"] . "</p>";
            echo "<img src='../IMG/" . $row["url_img"] . "' alt='img' width='100' height='100'>";
            
            echo "<div class='image-container'>";
            echo "<a href='../html_admin/agregarCarrito.php?var=".$row["id"]."&user=$user'><img src='carrito.png' class='mini-button'></a>";
            echo "</div>";
            echo "<p class='precio'>" . $row["precio"] . "</p>";
            echo "</div>";
            echo "</div>";
        }
    }
?>


       
        
    </div>

    </div>  
    
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Le cortamos los pelos</title>
        <link rel="stylesheet" href="../CSS_admin/productos_admin.css">
        <link rel="stylesheet" href="../CSS/navbar.css">

    </head>
    <body>
        
        <h1 class="title">   Bienvenido mi estimado admin</h1>

        <header class="header">
            <nav class="nav">
              <a href="../html_usuarios/main.html" class="logo nav-link">LCLP</a>
              <button class="nav-toggle" aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
              </button>
              <ul class="nav-menu">
                <li class="nav-menu-item">
                  <a href="productos_visitantes.html" class="nav-menu-link nav-link">Productos & estilos</a>
                </li>
                <li class="nav-menu-item">
                  <a href="../html_admin/mostrar_usuarios.php" class="nav-menu-link nav-link">modificar usuarios</a>
                </li>
                <li class="nav-menu-item">
                  <a href="../html_admin/mostrar_productos.php" class="nav-menu-link nav-link">modificar productos</a>
                </li>
                <li class="nav-menu-item">
                  <a href="../index.html" class="nav-menu-link nav-link nav-menu-link_active">cerrar sesion</a>
                </li>
              </ul>
            </nav>
          </header>

          <form action="productos.php", method="post">
            <title></title>
            <label for="producto">Nombre del producto: </label>
            <input type="text" name="producto">
            <br><br>


            <label for="precio">precio: </label>
            <input type="text" name="precio">
            <br><br>
            <br>

            <label for="fechaingrso">Ingrese la fecha de ingreso: </label>
            <input type="text" name="fechaingreso">
            <br><br>
            <br>

            <input id="enviar" type="submit" value="Registrar">
        </form>
    
        
    </body>
</html>
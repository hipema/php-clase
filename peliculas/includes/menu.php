<h4>Bienvenido <?php echo $_SESSION['usuario'] ?></h4>
    <?php if ($_SESSION['rol'] == 3) { ?>
        <h4><a href="index.php?vista=verfavoritos">Ver favoritos</a></h4> <!-- Es una función que muestra favoritos -->
    <?php } else if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1) {?>
        <h4><a href="index.php?vista=verusuario">Ver Usuarios</a></h4> <!-- funcion mostrar usuarios -->
        <?php if ($_SESSION['rol'] == 1) { ?> 
            <h4><a href="index.php?vista=annadirpelicula">Añadir películas</a></h4> <!-- funcion añadir peliculas-->
        <?php } ?>
        <?php } ?>
        <?php if ($_SESSION['usuario'] != "invitado") { ?>
            <h4><a href="index.php?sesion=off">Desconectar</a></h4>
    <?php } ?>

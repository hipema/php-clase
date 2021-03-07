<?php 
    session_start();
    include "class/Usuario.php";
    include "class/Pelicula.php";
    include "class/Genero.php";
    include "config/config.php";

    // Logout
    if ($_GET['sesion'] == "off"){
        unset($_SESSION['usuario']);
        unset($_SESSION['rol']);
        unset($_SESSION['id']);
        session_destroy();
        session_start();
        session_regenerate_id(true);
    }

    // Entramos y vemos si existe sesión o no.
    if (!isset($_SESSION['usuario'])){
        $_SESSION['usuario'] = "invitado";
    }
    $registro = false;

    if ($_POST['logeo']){
        $registro = $usuarios->loginUsuario($_POST['usuario'], $_POST['password']);
        if ($registro){
            $_SESSION['usuario'] = $registro['nombre'];
            $_SESSION['rol'] = $registro['rol'];
            $_SESSION['id'] = $registro['id'];
        }
    }

    ?>
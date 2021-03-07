<?php
    session_start();
    include "class/Tarea.php";
    include "class/Usuario.php";
    include "class/Modulo.php";
    include "config/config.php";
    
    $tareaId = "";
    if ($_GET['id']){
        $tareaId = $_GET['id'];
    }
    
    if ($_GET['confirmar']){
        $tarea->delete($tareaId);
        header("Location: ./index.php");
    }
    $tareaSeleccionada = $tarea->get($tareaId);
    $nombreModulo = $modulos->obtenerModuloPorId($tareaSeleccionada[0]['idModulo']);
    
    include 'includes/cabecera.php';
    include 'includes/menu.php';
    include 'includes/tarea.php';
    include 'includes/mensaje-confirmacion.php';
    include 'includes/footer.php';
?>

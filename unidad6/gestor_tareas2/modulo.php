<?php
    session_start();
    
    include "class/Tarea.php";
    include "class/Usuario.php";
    include "class/Modulo.php";
    include "config/config.php";
    
    $moduloId = "";
    if ($_GET['id']){
        $moduloId = $_GET['id'];
    }

    $nombreModulo = $modulos->obtenerModuloPorId($moduloId);
    $tareasPendientes = $tarea->getTareasModuloPendientes($moduloId);
    $tareasCompletadas = $tarea->getTareasModuloCompletadas($moduloId);

    include 'includes/cabecera.php';
    include 'includes/menu.php';
    // include 'includes/tarea.php';
    // include 'includes/resumen-tareas.php';
    // include 'includes/annadir_tarea.php';
    // include 'includes/lista_tareas.php';
    include 'includes/listado-modulo-pendientes.php';
    include 'includes/listado-modulo-completadas.php';
    include 'includes/footer.php';
?>

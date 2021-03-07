<?php
    session_start();
    include "class/Tarea.php";
    include "class/Usuario.php";
    include "class/Modulo.php";
    include "funciones/generales.php";
    include "config/config.php";
    
    $tareaId = "";
    if ($_GET['id']){
        $tareaId = $_GET['id'];
    }

    if (isset($_POST['editar'])){
        include 'funciones/validacion-editar-tarea.php';
        include 'funciones/editar-tarea.php';
        header("Location: ./tarea.php?id=".$tareaId);
    } 

    $tareaSeleccionada = $tarea->get($tareaId);
    $nombreModulo = $modulos->obtenerModuloPorId($tareaSeleccionada[0]['idModulo']);
    
    include 'includes/cabecera.php';
    include 'includes/menu.php';
    include 'includes/editar_tarea.php';
    // include 'includes/resumen-tareas.php';
    // include 'includes/annadir_tarea.php';
    include 'includes/lista_tareas.php';
    include 'includes/footer.php';
?>

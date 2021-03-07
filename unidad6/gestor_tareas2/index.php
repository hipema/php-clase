<?php
/**
 * Index para la prueba del uso de clases en base de datos.
 */
    session_start();

    include "class/Tarea.php";
    include "class/Usuario.php";
    include "class/Modulo.php";
    include "funciones/generales.php";
    include "config/config.php";

    if (isset($_POST['enviar'])){
        include 'funciones/validacion-annadir-tarea.php';
        include 'funciones/alta-tarea.php';
    } 

    if ($_GET['completarTarea']){
        $tarea->estadoCompletado($_GET['completarTarea']);
        $listaTareas = $tarea->getAllPendientes();
    }
    
    // Comenzamos la presentación de la web
    include 'includes/cabecera.php';
    include 'includes/menu.php';
    include 'includes/resumen-tareas.php';
    include 'includes/annadir_tarea.php';
    include 'includes/lista_tareas.php';
    include 'includes/footer.php';
?>

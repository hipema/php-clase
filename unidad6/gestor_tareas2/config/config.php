<?php
            define("DBHOST", "db");
            define("DBUSER","root");
            define("DBPASS", "123456");
            define("DBNAME", "gestor_tareas");
            define("DBPORT",3306);	

    $titulo = "Gestor de Tareas - Manolo Hidalgo - 2ºDAW";
    $numRecuadro = ["uno", "dos", "tres", "cuatro", "cinco", "seis"];

    // Variables para la validación del formulario
    $fecha_r = $modulo_r = $titulo_r = $descripcion_r = $ProcesaFormulario = "";
    
    // Creamos la instancia de la clase tarea
    $tarea = Tarea::getInstancia();

    // Creamos la instancia de la clase usuario
    $usuario = Usuario::getInstancia();

    // Creamos la instancia de los módulos
    $modulos = Modulo::getInstancia();

    $listaModulos = $modulos->getAll();
    $listaTareas = $tarea->getAllPendientes();
?>
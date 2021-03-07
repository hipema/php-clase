<?php
    // Creamos la instancia de la clase tarea
    $tarea = Tarea::getInstancia();

    // Creamos la instancia de la clase usuario
    $usuario = Usuario::getInstancia();

    // Creamos la instancia de los módulos
    $modulos = Modulo::getInstancia();

    $listaModulos = $modulos->getAll();
    $listaTareas = $tarea->getAllPendientes();
    ?>
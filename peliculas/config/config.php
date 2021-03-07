<?php
            define("DBHOST", "db");
            define("DBUSER","root");
            define("DBPASS", "123456");
            define("DBNAME", "peliculas");
            define("DBPORT",3306);	

    // $titulo = "Gestor de Tareas - Manolo Hidalgo - 2ºDAW";
    // $numRecuadro = ["uno", "dos", "tres", "cuatro", "cinco", "seis"];

    // // Variables para la validación del formulario
    // $fecha_r = $modulo_r = $titulo_r = $descripcion_r = $ProcesaFormulario = "";
    
    // Creamos la instancia de la clase Películas
        $peliculas = Pelicula::getInstancia();
        $listadoPeliculas = $peliculas->getAll();

    // // Creamos la instancia de la clase usuario
        $usuarios = Usuario::getInstancia();
        
    // // Creamos la instancia de los Generos
        $generos = Genero::getInstancia();
        $listaGeneros = $generos->getAll();

    // $listaModulos = $modulos->getAll();
    // $listaTareas = $tarea->getAllPendientes();
?>
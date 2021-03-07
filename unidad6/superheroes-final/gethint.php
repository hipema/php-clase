<?php
    include_once "funciones.php";
    $conexion = conectaDB();
    if ($_GET['q']){
        $valorNombre = $_GET['q']."%";
        $sqlBuscar = "select * from superheroe where nombre like :nombreRecibido";
        $consulta = $conexion -> prepare($sqlBuscar);
        $consulta -> execute(array(":nombreRecibido" => $valorNombre));
        $respuesta = "<p>";
        foreach ($consulta as $valor){
            $respuesta = $respuesta.$valor['nombre'].'<br/>';
        }
        echo $respuesta.'</p>';
    }
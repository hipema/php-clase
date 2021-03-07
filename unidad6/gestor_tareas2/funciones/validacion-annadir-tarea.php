<?php

    $fecha_r = clearData($_POST['fecha']);
    $modulo_r = clearData($_POST['modulo'][0]);
    $titulo_r = clearData($_POST['titulo']);
    $descripcion_r = clearData($_POST['descripcion']);
    $ProcesaFormulario = true;

    //Validación fecha
    if (empty($fecha_r)){
        $msgErrorFecha= "Fecha requerida";
        $fecha_r="";
        $ProcesaFormulario = false;
        var_dump($ProcesaFormulario);
    }
    // Validación módulo
    if (empty($modulo_r)) {
       $msgErrorModulo = "Debe indicar un módulo";
       $modulo_r= "";
       $ProcesaFormulario = false;
    }
    // Validación titulo
    if (empty($titulo_r)) {
       $msgErrorTitulo = "Debe indicar un título";
       $titulo_r= "";
       $ProcesaFormulario = false;
    }
    // Validación descripcion
    if (empty($descripcion_r)) {
       $msgErrorDescripcion = "Debe indicar una descripcion";
       $descripcion_r= "";
       $ProcesaFormulario = false;
    }

?>
<?php
if ($ProcesaFormulario){
    $tarea_a_annadir = [
        "fecha" => $fecha_r,
        "titulo" => $titulo_r,
        "descripcion" => $descripcion_r,
        "idModulo" => $modulo_r,
        "idEstado" => 1,
        "idUsuario" => 1
    ];

    $tarea->set($tarea_a_annadir);
    $listaTareas = $tarea->getAllPendientes();
}

?>
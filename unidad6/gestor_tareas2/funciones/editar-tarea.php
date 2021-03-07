<?php
if ($ProcesaFormulario){
    $tarea_a_editar = [
        "fecha" => $fecha_r,
        "titulo" => $titulo_r,
        "descripcion" => $descripcion_r,
        "idModulo" => $modulo_r,
        "idEstado" => 1,
        "idUsuario" => 1,
        "id"=> $tareaId
    ];

    $tarea->edit($tarea_a_editar);
    $listaTareas = $tarea->getAllPendientes();
}

?>
<section class="seccion-tarea">
    <h2><?php echo $tareaSeleccionada[0]['titulo']; ?></h2>
    <div id="infoTarea"><div><span class="tareaApartado">Fecha</span>: <?php echo $tarea->formatearFecha($tareaSeleccionada[0]['fecha']); ?></div>
    <div><span class="tareaApartado">Módulo</span>: <?php echo $nombreModulo ?></div>
    <div><span class="tareaApartado">Descripción</span>:</div>
    <div><?php echo $tareaSeleccionada[0]['descripcion'];?></div>
    <div class="opciones"><a href="borrar-tarea.php?id=<?php echo $tareaSeleccionada['id']; ?>" class="borrar"><i class="fa fa-trash-o" aria-hidden="true"></i></a> <a href="index.php?completarTarea=<?php echo $tareaSeleccionada[0]['id'] ?>" class="marcar-completado"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a></div></div>
</section>
<section>
    <h2 id="bListadoCompletadas">Tareas de <?php echo $nombreModulo ?> completadas <i class="fa fa-angle-double-right" id="iListaCompletadas"></i></h2>
    <div class="listado" id="seccionListadoCompletadas">
        <?php foreach ($tareasCompletadas as $tareaSeleccionada) { ?>
            <article><a href="<?php echo 'tarea.php?id='.$tareaSeleccionada['id'];?>" class="enlace-fecha"><time><?php echo $tarea->formatearFecha($tareaSeleccionada['fecha']); ?></time></a><a href="<?php echo 'tarea.php?id='.$tareaSeleccionada['id'];?>" class="enlace-modulo"><?php echo $modulos->obtenerModuloPorId($tareaSeleccionada['idModulo']) ?></a><a href="<?php echo 'tarea.php?id='.$tareaSeleccionada['id'];?>" class="enlace-listado"><?php echo $tareaSeleccionada['titulo'] ?></a><div class="opciones"><a href="<?php echo 'tarea.php?id='.$tareaSeleccionada['id'];?>" class="verMas"><i class="fa fa-eye"></i></a> <a href="#" class="borrar"><i class="fa fa-trash-o" aria-hidden="true"></i></a> <a href="#" class="marcar-completado"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>  <a href="#" class="edit"><i class="fa fa-edit"></i></a></div></article>
        <?php }?>
    </div>
</section>
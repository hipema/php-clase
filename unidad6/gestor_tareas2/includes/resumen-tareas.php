<section >
    <h2 id="bResumen">Resumen de tareas <i class="fa fa-angle-double-right" id="iResumen"></i></h2>
    <div class="resumen" id="seccionResumen">
    <?php $contador = 0;
        foreach ($listaModulos as $modulo) { ?>
        <article class="cuadro-resumen <?php echo $numRecuadro[$contador++]?>">
        <div class="recuento"><?php echo $tarea->contarTareas($modulo['id']);?></div>
        <div class="asignatura"><?php echo $modulo['nombreModulo']; ?></div>
        </article>
    <?php }?>
    </div>
</section>
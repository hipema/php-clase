<section class="seccion-anadir">
    <h2 id="bAnadir">Añadir tarea <i class="fa fa-angle-double-right" id="iAnadir"></i></h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="seccionAnadir">
    <div><label for="idFecha">Fecha: </label><input type="date" name="fecha" id="idFecha" required></div>
    <div><label for="idModulo">Módulo: </label>
    <select name="modulo[]" id="idModulo" required>
        <option value=""></option>
    <?php
        foreach ($listaModulos as $moduloSeleccionado) {?>
            <option value="<?php echo $moduloSeleccionado['id'];?>"><?php echo strtoupper($moduloSeleccionado['nombreModulo']);?></option>
        <?php } ?>
    </select></div>
    <div><label for="idTitulo">Título: </label><input type="text" name="titulo" id="idTitulo" required></div>
    <div><label for="idDescripcion">Descripción:</label></div>
    <div><textarea name="descripcion" id="idDescripcion" rows="10"></textarea></div>
    <div class="anadir"><input type="submit" name="enviar" value="Añadir"></div>
    </form>
    </section>
    
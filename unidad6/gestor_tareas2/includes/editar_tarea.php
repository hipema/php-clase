<section class="seccion-anadir">
    <h2 id="bAnadir">Editar tarea <i class="fa fa-angle-double-right" id="iAnadir"></i></h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="seccionAnadir">
    <div><label for="idFecha">Fecha: </label><input type="date" name="fecha" id="idFecha" value="<?php echo substr($tareaSeleccionada[0]['fecha'], 0, 10);?>" required></div>
    <div><label for="idModulo">Módulo:</label>
    <select name="modulo[]" id="idModulo" required>
        <option value=""></option>
    <?php
        foreach ($listaModulos as $moduloSeleccionado) {?>
            <option value="<?php echo $moduloSeleccionado['id'];?>" <?php if ($moduloSeleccionado['id'] == $tareaSeleccionada[0]['idModulo']) echo 'selected';?>><?php echo strtoupper($moduloSeleccionado['nombreModulo']);?></option>
        <?php } ?>
    </select></div>
    <div><label for="idTitulo">Título: </label><input type="text" name="titulo" id="idTitulo" value="<?php echo $tareaSeleccionada[0]['titulo']?>" required></div>
    <div><label for="idDescripcion">Descripción:</label></div>
    <div><textarea name="descripcion" id="idDescripcion" rows="10"><?php echo $tareaSeleccionada[0]['descripcion']?></textarea></div>
    <input type="text" name="id" value="<?php echo $tareaSeleccionada[0]['id']?>" hidden>
    <div class="anadir"><input type="submit" name="editar" value="Editar"></div>
    </form>
</section>
    
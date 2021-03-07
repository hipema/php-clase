<h3>Añadir película</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="seccionAnadir">
            <input type="text" name="titulo" placeholder="Titulo">
            <input type="text" name="anyo" placeholder="2021">
            <input type="text" name="edad_recomendada" placeholder="18">
            <input type="text" name="director" placeholder="director">
            
            <?php foreach ($listaGeneros as $generoSeleccionado) {?>
            <input type="checkbox" name="generos[]" value="<?php echo $generoSeleccionado['id'];?>"><?php echo strtoupper($generoSeleccionado['nombre']);?>
            <?php } ?>
            </input>

            <input type="submit" name="annadirpelicula" value="Añadir">
        </form>
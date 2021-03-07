<h3>Formulario de registro / login</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="seccionAnadir">
        <input type="text" name="usuario" placeholder="usuario">
        <input type="password" name="password" placeholder="pass">
        <input type="submit" name="logeo" value="logeo">
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="seccionAnadir">
        <input type="text" name="usuario" placeholder="usuario">
        <input type="password" name="password" placeholder="pass">
        <input type="text" name="edad" placeholder="edad">
        <input type="submit" name="registrar" value="registrar">
    </form>
<?php
/**
 * @author: manolohidalgo_
 */
session_start();

if (isset($_POST['salir'])){
    unset($_SESSION['usuario']);
    unset($_SESSION['password']);
    unset($_SESSION['aut']);
    session_destroy();
    session_start();
    session_regenerate_id(true);
}

if ($_SESSION['aut'] == true){
    echo "<h1>Página autentificada<h2>";
    echo "<h2>Bienvenido ".$_SESSION['usuario'].'</h2>'; 
} else {
    header("Location: ./actividad02.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manolohidalgo_"/>
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
    <h3>Esta es una sección exclusiva para usuarios registrados</h3>
    <p><a href="./actividad02publico.php">Web pública</p>
    <p><a href="./actividad02.php">Panel de Usuario</p>
    <?php
    echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
            echo "<input type=\"submit\" name=\"salir\" placeholder=\"Salir\" value=\"Logout\" />";
            echo '</form>';
    ?>
</body>
</html>
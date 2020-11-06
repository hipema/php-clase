<?php
session_start();
if ((time() - $_SESSION['horaInicio']) > 10){
    unset($_SESSION['count']);
    unset($_SESSION['horaInicio']);
    session_destroy();
    session_start();
    session_regenerate_id(true);
} else {
    if (empty($_SESSION['count'])){
        $_SESSION['count'] = 1;
    } else {
        $_SESSION['count']++;
        $_SESSION['horaInicio'] = time();
    }
}
if (!isset($_SESSION['horaInicio'])) {
    $_SESSION['horaInicio'] = time();
    $_SESSION['count'] = 0;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manolohidalgo_"/>
    <link rel="stylesheet" href="prueba03.css">
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
    <main>
        <div>
    <?php
        echo '<p>'.$_SESSION['count'].'</p>';
        echo "<a href=\"prueba03.php?".htmlspecialchars(SID)."\">Continuar</a>";
    ?>
        </div>
    </main>
</body>
</html>
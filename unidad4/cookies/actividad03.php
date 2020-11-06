<?php
/**
 * @author: manolohidalgo_
 * @since: 03-11-2020
 */
    // Variable de control
    $ProcesaFormulario = false;
    $usuario = $_COOKIE['user'] ?? "";
    $contrasena = $_COOKIE['password'] ?? "";
    $recordar = false;
    $cookie = [];

    function clearData($cadena)
    {   
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena_limpia;
    }   
    
    if (isset($_POST['enviar'])) {
        $usuario = clearData($_POST['usuario']);
        $contrasena = clearData($_POST['contrasena']);
        $recordar = $_POST['recordar'];
        $ProcesaFormulario = true;

        // $cookie = $_COOKIE['user'] ?? null; // asigna el valor de $_COOKIE['user'] o null en caso de que esta no existiese.
        if ($recordar){
            setcookie("user", $usuario, time()+3600);
            setcookie("password", $contrasena, time()+3600);
        } else { // Crear Cookie
            setcookie("user", $usuario, time()-3600);
            setcookie("password", $contrasena, time()-3600);
        }
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
    <noscript>Esta página necesita tener activado JavaScript para su correcto visionado.</noscript>
    
</body>
<div class="principal">
    <?php
        if ($ProcesaFormulario){
            echo 'Usuario: '.$usuario.'<br>';
            echo 'Contraseña: '.$contrasena;
        } else {
            echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
            echo '<input type="text" name="usuario" placeholder="usuario" value="'.$usuario.'" /><br/>';
            echo '<input type="text" name="contrasena" placeholder="contrasena" value="'.$contrasena.'" /><br/>';
            echo "<input type=\"submit\" name=\"enviar\" placeholder=\"Send\" value=\"Enviar\" /> <br>";
            echo '<input type="checkbox" id="recordar" value="recordar" name="recordar"> Recordar<br>';
        }
    ?>
</div>
</html>
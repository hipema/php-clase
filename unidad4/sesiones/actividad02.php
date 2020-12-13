<?php
/**
 * @author: manolohidalgo_
 * @since: 09/11/2020
 * 
 * Formulario de autentificación
 */
    session_start();

    if ($_POST['limpiarDatosSesion']){
        unset($_SESSION['usuario']);
        unset($_SESSION['password']);
        unset($_SESSION['aut']);
        session_destroy();
        session_start();
        session_regenerate_id(true);
    }

    if (!$_SESSION['usuario']){
        $_SESSION['usuario'] = "invitado";
    }
    $usuario = "";
    $password = "";

    function clearData($cadena) {
        $cadena_limpia = trim($cadena);
        $cadena_limpia = htmlspecialchars($cadena_limpia);
        $cadena_limpia = stripslashes($cadena_limpia);
        return $cadena_limpia;
    }


    $procesaFormulario = true;
    if ($_POST['enviar']){
        $usuario = clearData($_POST['usuario']);
        $password = clearData($_POST['password']);
        if ($usuario == $password){
            $_SESSION['usuario'] = $usuario;
            $_SESSION['aut'] = true;
        }
    }

    // Procesamiento formulario
    if ($procesaFormulario){
        if ($_POST['usuario'] == 'admin' and $_POST['password'] == 'admin' and $_SESSION['aut'] == true){

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
    <?php
        echo "<h1>Ejemplo de autentificación</h1>";
        echo 'Usted está como '.$_SESSION['usuario'].'<p>';
        if ($_SESSION['aut']){
            // mostrar_menu()
            // mostrar_cierresesion()
            echo "<a href=\"actividad02privado.php\">Privado</a><br/>";
            echo "<a href=\"publica.php\">Publica<br/></a>";
            echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
            echo "<input type=\"submit\" name=\"limpiarDatosSesion\" placeholder=\"Send\" value=\"Salir\" />";
            echo '</form>';
            
        } else {
            // mostrar_formulariologin();
            echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
            echo '<p><strong>Usuario:</strong></br><input type="usuario" name="usuario" placeholder="Usuario" value="' . $usuario . '" /> <strong>'.$msgErrorUsuario.'</strong></p>';
            echo '<p><strong>Contraseña:</strong></br><input type="password" name="password" placeholder="password" value="' . $password . '" /> <strong>'.$msgErrorPassword.'</strong></p>';
            echo "<input type=\"submit\" name=\"enviar\" placeholder=\"Send\" value=\"Enviar\" />";
            echo '</form>';
        }

    ?>
</body>
</html>
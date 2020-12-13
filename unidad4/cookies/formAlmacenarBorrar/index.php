<?php
/**
 * @author: manolohidalgo_
 * Crea un formulario de login que permita al usuario recordar los datos introducidos.
 * Incluye una opción para borrar la información almacenada.
 */

 $titulo = "Ejercicio 3";
 $descripcion = "Crea un formulario de login que permita al usuario recordar los datos introducidos. Incluye una opción para borrar la información almacenada.";

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
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/estilo.css">
    <script src="https://use.fontawesome.com/0fbf2b9dd0.js"></script>
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
    <header><img src="./img/logo-manolohidalgo.png" alt=""></header>
    <nav><h2><?php echo $titulo ?></h2></nav>
    <div class="ejercicio">
        <p>
            <?php echo $descripcion ?>
        </p>
    </div>
    <div class="contenedor">
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
        <div class="lateral"></div>
    </div>
    <footer>
        <div class="redes">
        <div><a href="http://www.twitter.com/manolohidalgo_" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i><span class="redesNombre">Twitter</span</a></div>
        <div><a href="https://www.linkedin.com/in/manuelhidalgoperez/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i><span class="redesNombre">Linkedin</span</a></div>
        <div><a href="https://github.com/hipema" target="_blank"><i class="fa fa-github" aria-hidden="true"></i><span class="redesNombre">Github</span</a></div>
        <div><a href="http://www.manolohidalgo.com" target="_blank"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="redesNombre">Web Personal</span</a></div>
        </div>
    </footer>
</body>
</html>
<?php
/**
 * @author: manolohidalgo_
 * 
 * contactos (array indexado con "contacto")
 *     contacto (array asociativo con ["nombre", "apellidos", "telefono", "email"])
 */
 session_start();
 $titulo = "Ejercicio 1";
 $descripcion = "Crear una aplicación para gestionar una agenda de contactos.";
 $contactosEnAgenda = 0;
 
 if ($_POST['reiniciarAgenda']){
     unset($_SESSION['contactos']);
     session_destroy();
     session_start();
     session_regenerate_id(true);
    }
    
 if (!isset($_SESSION['contactos'])){
     $_SESSION['contactos'];
 };

 $nombre = $apellidos = $telefono = $email = "";
 $errorNombre = $errorApellidos = $errorTelefono = $errorEmail = "";
 
 if ($_POST['altaContacto']){
    if (!empty($_SESSION['contactos'])){
        $contactosEnAgenda = sizeof($_SESSION['contactos']);
    }
    $nombre = clearData($_POST['nombre']);
    $apellidos = clearData($_POST['apellidos']);
    $telefono = clearData($_POST['telefono']);
    $email = clearData($_POST['email']);

    if (empty($nombre)){
        $errorNombre = "error";
    } else if (empty($apellidos)){
        $errorApellidos = "error";
    } else if (($telefono < 600000000 || $telefono > 999999999) && !empty($telefono)){
        $errorTelefono = "error";   
    } else if (!(filter_var($email, FILTER_VALIDATE_EMAIL)) && !empty($email)){
        $errorEmail = "error";
    } else {
        $_SESSION['contactos'][$contactosEnAgenda]['nombre'] = $nombre;
        $_SESSION['contactos'][$contactosEnAgenda]['apellidos'] = $apellidos;
        $_SESSION['contactos'][$contactosEnAgenda]['telefono'] = $telefono;
        $_SESSION['contactos'][$contactosEnAgenda]['email'] = $email;
    }

 }

 function clearData($cadena){
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena_limpia;
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
            <h3>Lista de contactos</h3>;
            <div class="listaContactos">
                <?php
                if (!empty($_SESSION['contactos']) > 0){
                    echo '<table>';
                    echo '<tr><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th></tr>';
                    foreach ($_SESSION['contactos'] as $contacto) {
                        echo '<tr><td>'.$contacto['nombre'].'</td><td>'.$contacto['apellidos'].'</td><td>'.$contacto['telefono'].'</td><td>'.$contacto['email'].'</td></tr>';
                    }
                    echo '</table>';
                }
                ?>
            </div>
            
        </div>
        <div class="lateral">
            <div class="insertarContactos">
                <h3>Formulario de Alta</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <p><label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" placeholder="Federico *" value="<?php echo $nombre ?>" class="<?php echo $errorNombre?>"/></p>
                    <p><label for="apellidos">Apellidos: </label><input type="text" name="apellidos" id="apellidos" placeholder="Torralbo *" value="<?php echo $apellidos ?>" class="<?php echo $errorApellidos?>" /></p>
                    <p><label for="telefono">Teléfono: </label><input type="text" name="telefono" id="telefono" placeholder="666666666" value="<?php echo $telefono ?>" class="<?php echo $errorTelefono?>"/></p>
                    <p><label for="email">Email: </label><input type="text" name="email" id="email" placeholder="info@manolohidalgo.com" value="<?php echo $email ?>" class="<?php echo $errorEmail?>"/></p>
                    <p><input type="submit" name="altaContacto" value="Alta Contacto"/></p>
                </form>
                
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                Reiniciar Agenda: <input type="submit" name="reiniciarAgenda" value="Borrar contactos"/> </form>
            </div>
        </div>
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


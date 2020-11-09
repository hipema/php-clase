<?php
    /**
     * @author: manolohidalgo_
     * Ejercicio agenda.
     * @since: 09-11-2020
     */

     session_start();
     $msgErrorFecha = "";
     $msgErrorTarea = "";
     $fecha = "";
     $tarea = "";

     // Limpiar datos
    function clearData($cadena) {
        $cadena_limpia = trim($cadena);
        $cadena_limpia = htmlspecialchars($cadena_limpia);
        $cadena_limpia = stripslashes($cadena_limpia);
        return $cadena_limpia;
    }

    // Comprobar validez fecha
    function compruebaFecha($fecha){
        $valores = explode("/", $fecha);
        return checkdate ($valores[1], $valores[0], $valores[2]);
    }
    // Destruimos sesion y borramos datos
    if ($_POST['limpiarDatos']){
        unset($_SESSION['tareas']);
        session_destroy();
        session_start();
        session_regenerate_id(true);
    }

    // Declaramos variables de sesión
    if (!isset($_SESSION['tareas'])){
        $_SESSION['tareas'] = array();
    }

    // Validamos datos
    if (isset($_POST['enviar'])){
        $procesaFormulario = true;
        $fecha = clearData($_POST['fecha']);
        $tarea = clearData($_POST['tarea']);
        
        if (empty($fecha)){
            $msgErrorFecha = "La fecha no puede estar vacía";
            $procesaFormulario = false;
        } else {
            if (!compruebaFecha($fecha)){
                $msgErrorFecha = "Fecha incorrecta";
                $procesaFormulario = false;
            };
        }
        if (empty($tarea)){
            $msgErrorTarea = "La tarea no puede estar vacía.";
            $procesaFormulario = false;
        }
        if ($procesaFormulario) {
            array_push($_SESSION['tareas'], array($fecha, $tarea));
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
        // Formulario
        echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
        echo '<fieldset>';
        echo '<legend>Insertar tarea</legend>';
        echo '<p><strong>Fecha:</strong></br><input type="fecha" name="fecha" placeholder="dd/mm/aaaa" value="' . $fecha . '" /> <strong>'.$msgErrorFecha.'</strong></p>';
        echo '<p><strong>Tarea:</strong></br><input type="tarea" name="tarea" placeholder="Insertar tarea" value="' . $tarea . '" /> <strong>'.$msgErrorTarea.'</strong></p>';
        echo "<input type=\"submit\" name=\"enviar\" placeholder=\"Send\" value=\"Enviar\" />";
        echo "<input type=\"submit\" name=\"limpiarDatos\" placeholder=\"Send\" value=\"Limpiar Tareas\" />";
        echo '</fieldset>';
        
        if ($procesaFormulario){
            foreach ($_SESSION['tareas'] as $tarea) {
                echo $tarea[0].' '.$tarea[1].'<br/>';
            }
        }
        ?>


 </body>
 </html>
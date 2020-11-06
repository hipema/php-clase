<?php
/**
 * @author: manolohidalgo_
 * @since: 19-10-2020
 */
// Almacena Datos Personales
$datosPersonales = array(
                         array("nombre" => 'nombre',
                               "tipo" => 'text',
                               "error" => '',
                               "placeholder" => 'nombre'),
                         array("nombre" => 'email',
                               "tipo" => 'text',
                               "error" => '',
                               "placeholder" => 'email'),
                         array("nombre" => 'url',
                               "tipo" => 'text',
                               "error" => '',
                               "placeholder" => 'url'),
                         array("nombre" => 'comentario',
                               "tipo" => 'textarea',
                               "error" => '',
                               "placeholder" => 'comentario'));
// Almacena Género
$genero = array("hombre", "mujer", "otro"); // radio buton

// Almacena transportes
$transportes = array(
                    array ( "nombre" => "bicicleta",
                            "id" => "bicicleta",
                            "valor" => "bicicleta",
                            "seleccionado" => false),
                    array ( "nombre" => "coche",
                            "id" => "coche",
                            "valor" => "coche",
                            "seleccionado" => false),
                    array ( "nombre" => "patinete",
                            "id" => "patinete",
                            "valor" => "patinete",
                            "seleccionado" => false));  

// Almacena opciones del checklist
$opcionesDesplegable = array("opcion1", "opcion2", "opcion3", "opcion4", "opcion5", "opcion6"); // checklist
$vehiculos = array("Renault", "Mercedes", "Citroen", "Volvo"); // seleccion multiple

function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena_limpia;
}

// Variable de control
$ProcesaFormulario = false;
// Datos iniciales de Datos Personales
$nombre = $email = $url = $comentario = "";
// Datos de Radio Buton
$generoSeleccionado = "";
$errorGenero = "";
// Datos de control Transportes
$transportesSeleccionados = [];
$cantidadTransportesSeleccionados = 0;
$errorTransportes = '';


// Validación de Datos Personales
if (isset($_POST['enviar'])) {
    $nombre = clearData($_POST['datosPersonales'][0]);
    $email = clearData($_POST['datosPersonales'][1]);
    $url = clearData($_POST['datosPersonales'][2]);
    $comentario = clearData($_POST['comentario']);
    $generoSeleccionado = $_POST['genero'];

    // Mantenencia datos Transportes
    foreach ($transportes as $transporte) {
        $control = false;
        foreach ($_POST['transportes'] as $transporteSeleccionado) {
            if ($transporteSeleccionado == $transporte['nombre']){
                $control = true;
                $cantidadTransportesSeleccionados++;
            }
        }
        if ($control){
            array_push($transportesSeleccionados, 1);
        } else {
            array_push($transportesSeleccionados, 0);
        }
    }

    for ($i=0; $i < sizeof($transportesSeleccionados); $i++){
        if ($transportesSeleccionados[$i] == 0){
            $transportes[$i]['seleccionado'] = false;
        } else {
            $transportes[$i]['seleccionado'] = true;
        }
    }

    $ProcesaFormulario = true;

    //Validación Nombre
    if (empty($nombre)) {
        $datosPersonales[0]['error'] = "Nombre requerido";
        $nombre = "";
        $ProcesaFormulario = false;
    }

    // Validación Email
    if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $datosPersonales[1]['error'] = "Email incorrecto";
        $email = "";
        $ProcesaFormulario = false;
    }
    // Validación ur
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $datosPersonales[2]['error'] = "URL requerida";
        $url = "";
        $ProcesaFormulario = false;
    }
    // Validación Comentario
    if (empty($comentario)) {
        $datosPersonales[3]['error'] = "Se requiere introducir un comentario";
        $comentario = "";
        $ProcesaFormulario = false;
    }

    // Validación Género
    if (empty($generoSeleccionado)){
        $errorGenero = "Debe seleccionar un género";
        $generoSeleccionado = "";
        $ProcesaFormulario = false;
    }

    // Validación Transporte
    if ($cantidadTransportesSeleccionados > 2){
        $errorTransportes = 'No puede seleccionar más de dos formas de transporte';
    }
}

// Buscar mensaje de error
function buscarError($datos){
    if ($datos == "nombre") {
        return $msgErrorNombre;
    } else if ($datos == "email") {
        return $msgErrorEmail;
    } else if ($datos == "url"){
        return $msgErrorURL;
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
if ($ProcesaFormulario) {
    // muestra los datos
    echo '<strong>Datos Personales:</strong></br>';
    foreach ($_POST['datosPersonales'] as $valor) {
        if ($valor != "Enviar") {
            echo $valor . '</br>';
        }
    }
    echo '<p>'.$_POST['comentario'].'</p>';
} else {
    echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
    // Bloque de Datos personales
    echo '<fieldset>';
    echo '<legend>Datos Personales</legend>';
    foreach ($datosPersonales as $datos) {
        $nombreVariable = $datos['nombre'];
        if ($datos['nombre'] != "comentario") {
            echo '<p><strong>' . ucfirst($datos['nombre']) . ': </strong></br><input type="'.$datos['tipo'].'" name="datosPersonales[]['.$datos['nombre'].'" placeholder="' .$datos['placeholder']. '" value="' . $$nombreVariable . '" /> <strong>'.$datos['error'].'</strong></p>';
        } else {
            echo '<p><strong>' . ucfirst($datos['nombre']) . ': </strong></br><textarea name="' . $datos['nombre'] . '" placeholder="' . $datos['placeholder'] . '" rows="10" cols="50">' . $$nombreVariable . '</textarea><strong> '.$datos['error'].'</strong></p>';
        }
    }
    echo '</fieldset>';

    // Bloque de Radio Button
    echo '<fieldset>';
    echo '<legend> Género <strong>'.$errorGenero.'</strong></legend>';
    foreach ($genero as $valorGenero) {
        echo '<input type="radio" id="'.$valorGenero.'" name="genero" value="'.$valorGenero.'">';
        echo '<label for="'.$valorGenero.'">'.ucfirst($valorGenero).'</label><br>';
    }
    echo '</fieldset>';

    // Bloque de CheckBox
    echo '<fieldset>';
    echo '<legend>Transportes<strong> '.$errorTransportes.'</strong></legend>';
    foreach ($transportes as $transporte) {
        if ($transporte['seleccionado'] == false){
            echo '<input type="checkbox" id="'.$transporte["id"].'" value="'.$transporte["valor"].'" name="transportes[]">'.$transporte["nombre"].'<br>';
        } else {
            echo '<input type="checkbox" id="'.$transporte["id"].'" value="'.$transporte["valor"].'" name="transportes[]" checked>'.$transporte["nombre"].'<br>';
        }
    }
    echo '</fieldset>';



    echo "<input type=\"submit\" name=\"enviar\" placeholder=\"Send\" value=\"Enviar\" />";
    // fin del formulario
    echo '</form>';
    
    
    if (isset($_POST['enviar'])) {
        echo 'Ha ocurrido un error' . $msgErrorNombre . ' ' . $msgErrorApellidos . ' ' . $msgErrorEmail . ' ' . $msgErrorUrl . ' ' . $msgErrorComentario;
    }
    echo '<br>nombre:<br>';
    // echo var_dump($_POST);
    echo var_dump($transportesSeleccionados);
    echo var_dump($transportes[0]['seleccionado']);
    echo var_dump($cantidadTransportesSeleccionados);
    
}
?>

</body>
</html>
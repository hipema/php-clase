<?php
/**
 * @author: manolohidalgo_
 * @since: 27-10-2020
 * 
 * Función recursiva que permita sumar los dígitos de un número pasado por la URL.
 */
function clearData($cadena){
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena_limpia;
 }
 $msgError = '';
 $ProcesaFormulario = false;
 // Validación
 if (isset($_GET['enviar'])){
    $numero = clearData($_GET['numero']);
    $ProcesaFormulario = true;
 
    //Validación nombre
    if (empty ($numero)){
       $msgError= "Debe introducir un valor";
       $ProcesaFormulario = false;
    } 
    if (is_int($numero)){
        $msgError= "Debe introducir un número";
        $ProcesaFormulario = false;
    }
 }

function calculaSumaDigitos($numero) {
    $resultado = 0;
    $restoNumero = intdiv($numero, 10);
    if ($numero != 0){
        $resultado = ($numero % 10) + calculaSumaDigitos($restoNumero);

    } else {
        return 0;
    }
    return $resultado;
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
        if ($ProcesaFormulario){
            // muestra los datos
            echo var_dump($numero);
            echo 'DNI: '.calculaSumaDigitos($numero);
        } else {
            echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
            echo '<input type="text" name="numero" placeholder="numero" value="'.$numero.'" />';
            echo "<input type=\"submit\" name=\"enviar\" placeholder=\"Send\" value=\"Enviar\" /> ".$msgError;
        }

    ?>
</body>
</html>
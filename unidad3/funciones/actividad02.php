<?php
/**
 * @author: manolohidalgo_
 * Escribe un script que permita factorizar un número pasado por la URL.
 * Muestra el resultado en dos columnas.
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
  } else if (!is_numeric($numero)){
    $msgError= "Debe introducir un valor numérico";
    $ProcesaFormulario = false;
  }

}

function factorizar ($numero){
    $divisor =2;
    echo '<table>';
    while ($numero >= $divisor){
        if ($numero % $divisor == 0){
        echo '<tr><td>'.$numero.'</td><td>'.$divisor.'<td></tr>';
        $numero = $numero / $divisor;
        } else {
            $divisor = proximoPrimo($divisor);
        }
    }
    echo '<tr><td>1</td></tr></table>';
    
}

function proximoPrimo($numero){
    $numero++;
    $esPrimo = false;
    if ($numero%2 == 0){
        $numero++;
    }
    while (!$esPrimo){
        $esPrimo = true;
        $divisor=3;
        while (($divisor<=sqrt($numero)) && $esPrimo) {
          if ($numero%$divisor==0) {
            $esPrimo = false;
          }
          $divisor +=2;
        }
        if ($esPrimo){
          return $numero;
        }
        $numero +=2;
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
    if ($ProcesaFormulario){
        // muestra los datos
        echo factorizar($numero);
    } else {
      echo '<p>Introduce un número para factorizar</p>';
      echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
      echo '<input type="text" name="numero" placeholder="Introduce un número" value="'.$numero.'" />';
      echo "<input type=\"submit\" name=\"enviar\" placeholder=\"Send\" value=\"Enviar\" /> ".$msgError;
    }
         
  ?>
</body>
</html>
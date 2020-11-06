<?php
/**
 * @author: manolohidalgo_
 * Escribe un script en php para calcular la letra del NIF a partir del número del DNI
 * enviado en la URL: http://dominio.local/calculaletra?dni=30182410.
 * La letra se obtiene calculando el resto de la división del número del DNI por 23.
 * A cada resultado le corresponde una letra.
 * 0=T; =R; 2=W; 3=A; 4=G; 5=M; 6=Y; 7=F; 8=P; 9=D; 10=X; 11=B; 12=N; 13=J; 14=Z; 15=S; 16=Q; 17=V; 18=H; 19=L; 20=C; 21=K; 22=E.
 * Utiliza un array para almacenar la relación letra, número.
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
   $dni = clearData($_GET['dni']);
   $ProcesaFormulario = true;

   //Validación nombre
   if (empty ($dni)){
      $msgError= "Debe introducir un valor";
      
      $ProcesaFormulario = false;
   } else if ($dni > 99999999){
      $msgError= "El número no puede tener más de 8 dígitos";
      
      $ProcesaFormulario = false;
   }
}


function calculaDNI($numero){
   $letrasDNI = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
   if ($numero == "" || $numero > 99999999) {
      return 'valor introducido incorrecto';
   }
   return $numero.'-'.$letrasDNI[$numero % 23];
}


//  echo 'DNI: '.calculaDNI($_GET['dni']);

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
            echo 'DNI: '.calculaDNI($dni);
        } else {
            echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="get">';
            echo '<input type="text" name="dni" placeholder="dni" value="'.$dni.'" />';
            echo "<input type=\"submit\" name=\"enviar\" placeholder=\"Send\" value=\"Enviar\" /> ".$msgError;
         }
         
        ?>
</body>
</html>
<?php
    // esto controla si el programa viene mediante la opción enviar.
    if (!isset($_POST['enviar'])){
        echo "Acceso no autorizado.";
    }
    foreach ($_POST as $valor) {
        if ($valor != "Enviar") echo $valor.'</br>';
    }
    ?>
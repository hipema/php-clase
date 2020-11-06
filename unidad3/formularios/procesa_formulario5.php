<?php
    // esto controla si el programa viene mediante la opción enviar.
    if (!isset($_POST['enviar'])){
        header('Location: formulario.php');
    }
    foreach ($_POST as $valor) {
        if ($valor != "Enviar") echo $valor.'</br>';
    }
    ?>
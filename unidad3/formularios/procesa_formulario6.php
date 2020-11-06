<?php

    foreach ($_POST as $valor) {
        if ($valor != "Enviar") echo $valor.'</br>';
    }
    echo var_dump($_POST);
    ?>
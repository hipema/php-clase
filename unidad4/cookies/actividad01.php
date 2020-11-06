<?php
    // Escriba una página que permita crear una cookie de duración limitada, comprobar el estado de la cookie y destruirla.
    $cookie = $_COOKIE['user'] ?? null; // asigna el valor de $_COOKIE['user'] o null en caso de que esta no existiese.
    if (isset($_COOKIE['user'])){
        echo $_COOKIE['user'];
    } else { // Crear Cookie
        setcookie("user", "Edgar Allan Poe", time()+3600);
    }


?>
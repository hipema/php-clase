<?php
require_once 'vendor/autoload.php';

use App\Models\{Persona, Perro};

$perro = new Perro('Perrete');
$yo = new Persona("Manolo", "Hidalgo");

$perro->ladra();
$yo->saluda();

echo $yo;

?>
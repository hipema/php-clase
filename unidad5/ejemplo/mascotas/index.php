<?php
require './app/models/Persona.php';
require './app/models/Perro.php';

use App\Models\{Persona, Perro};

$perro = new Perro('Perrete');
$yo = new Persona("Manolo", "Hidalgo");

$perro->ladra();
$yo->saluda();

echo $yo;

?>
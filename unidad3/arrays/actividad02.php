<?php
/**
 * @author: manolohidalgo_
 * @since: 28-10-2020
 * Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos.
 */

 $alumnos = array(array ("nombre" => "Jose Luis", "apellidos" => "Álvarez Fernández"),
                  array ("nombre" => "Rafael Alberto", "apellidos" => "Caballero Osuna"),
                  array ("nombre" => "Francisco Javier", "apellidos" => "Campos Gutiérrez"),
                  array ("nombre" => "David", "apellidos" => "Castilla Ortiz"),
                  array ("nombre" => "Fernando", "apellidos" => "Del Rosal Cuesta"),
                  array ("nombre" => "David", "apellidos" => "Galván Fontalba"),
                  array ("nombre" => "Álvaro", "apellidos" => "García Fuentes"),
                  array ("nombre" => "Antonio", "apellidos" => "García García"),
                  array ("nombre" => "Manuel", "apellidos" => "Hidalgo Pérez"),
                  array ("nombre" => "José", "apellidos" => "Sillero Salado")
                );

 $aleatorio = rand(0, 9);
 $alumnoAleatorio =  $alumnos[$aleatorio];

 echo $alumnoAleatorio['nombre'].' '.$alumnoAleatorio['apellidos'];
?>
<?php
include_once "funciones.php";

$conexion = conectaDB();
$editar = false;
$busqueda = false;
$heroes = [];

if ($_POST['annadir']){
    $superheroe = clearData($_POST['nombre']);

    $sqlAnadirHeroe = "insert into superheroe(nombre) values (:superheroe)";

    $consulta = $conexion -> prepare($sqlAnadirHeroe);
    $consulta -> execute(array(":superheroe" => $superheroe));
}

if ($_POST['editar']){
    $superheroe = clearData($_POST['nombre']);
    $sqlEditarHeroe = "update superheroe set nombre = :superheroe where  id =:idSuperheroe";
    $consulta = $conexion -> prepare($sqlEditarHeroe);
    $consulta -> execute(array(":superheroe" => $superheroe, 
                         ":idSuperheroe" => $_POST['id']));
}

if ($_GET['borrar']){
    $sqlBorrar = "DELETE FROM `superheroe` WHERE `superheroe`.`id` = :idSuperheroe";
    $consulta = $conexion -> prepare($sqlBorrar);
    $consulta -> execute(array(":idSuperheroe" => $_GET['borrar']));
}

if ($_GET['editar']){
    $editar = true;
    $sqlEditar = "select * from superheroe where id= :idSuperheroe";
    $consulta = $conexion -> prepare($sqlEditar);
    $consulta -> execute(array(":idSuperheroe" => $_GET['editar']));
    $heroe = "";
    foreach ($consulta as $valor) {
        $heroe = $valor['nombre'];
    }
}

if ($_POST['buscar']){
    $valorNombre = $_POST['nombre']."%";
    $busqueda = true;
    $sqlBuscar = "select * from superheroe where nombre like :nombreRecibido";
    $consulta = $conexion -> prepare($sqlBuscar);
    $consulta -> execute(array(":nombreRecibido" => $valorNombre));
    foreach ($consulta as $valor){
        array_push($heroes, $valor['nombre']);
    }
}

function clearData($cadena) {
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena_limpia;
}

// Hacemos consulta para ver los superhéroes actuales
$sqlSuperheroes = "select * from superheroe";

// $nombre = "Wonderwoman";

// $sql = "insert into superheroe(nombre) values ('".$nombre."')";

// $sql = "select * from superheroe";
// $resultado = $conexion->query($sql);
// foreach ($resultado as $valor) {
//     echo $valor['nombre'].'<br/>';
// }
// UPDATE
// $id = "5";
// $sql = "update superheroe set nombre = '".$nombre."' where id =".$id;

// $sql = "update superheroe set velocidad=5";

// if ($conexion ->query($sql)){
//     echo 'ok';
// } else {
//     echo 'error';
// }
?>

<?php
/**
 * @author: manolohidalgo_
 */

 $titulo = "Superhéroes";
 $descripcion = "Ejercicio que nos permite incluir valores en una tabla de Superhéroes, así como modificarlos, eliminarlos y además son listados para su visualización.";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manolohidalgo_"/>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/estilo.css">
    <script src="https://use.fontawesome.com/0fbf2b9dd0.js"></script>
    <script src="./js/main.js"></script>
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
    <header><img src="./img/logo-manolohidalgo.png" alt=""></header>
    <nav><h2><?php echo $titulo ?></h2></nav>
    <div class="ejercicio">
        <p>
            <?php echo $descripcion ?>
        </p>
    </div>
    <div class="contenedor">
        <div class="principal">
            <?php if (!$editar && !$busqueda) { ?>
                <h3>Inserta el nombre de un nuevo héroe</h3>
                <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                    <input type="text" name="nombre">
                    <input type="submit" name="annadir" value="Añadir">
                </form>
            <?php } else if ($editar){?>
                <h3>Modifica el nombre del superhéroe</h3>
                <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                    <input type="text" name="nombre" value="<?php echo $heroe ?>">
                    <input type="hidden" name="id" value="<?php echo $_GET['editar']?>">
                    <input type="submit" name="editar" value="Editar">
                </form>
                <?php } else { ?>
                    <h3>Lista de Héroes que empiezan por: <?php echo $_POST['nombre'] ?></h3>
                    <?php  
                    foreach ($heroes as $heroe) {
                        echo '<p>'.$heroe.'</p>';
                    }?>
                <?php } ?>
        </div>
        <div class="lateral">
            <h3>Listado SuperHéroes</h3>
        <!-- Mostramos listado de super héroes -->
        <?php
            $consulta = $conexion -> prepare($sqlSuperheroes);
            $consulta -> execute();
            $resultado = $consulta->fetchAll();
            foreach ($resultado as $valor) {
                echo $valor['nombre'].'<a href="index.php?borrar='.$valor['id'].'">Borrar</a>. <a href="index.php?editar='.$valor['id'].'">Editar</a><br/>';
            }?>
            <h3>Buscar Superhéroe</h3>
            <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
            <input type="text" name="nombre" id="" onkeyup="showHint(this.value)">
            <input type="submit" name="buscar" value="buscar">
            </form>
            <p></p>
            <div id="txtHint">MM</div>
            </div>
        </div>
        <div>
    </div>
    <footer>
        <div class="redes">
        <div><a href="http://www.twitter.com/manolohidalgo_" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i><span class="redesNombre">Twitter</span</a></div>
        <div><a href="https://www.linkedin.com/in/manuelhidalgoperez/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i><span class="redesNombre">Linkedin</span</a></div>
        <div><a href="https://github.com/hipema" target="_blank"><i class="fa fa-github" aria-hidden="true"></i><span class="redesNombre">Github</span</a></div>
        <div><a href="http://www.manolohidalgo.com" target="_blank"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="redesNombre">Web Personal</span</a></div>
        </div>
    </footer>
</body>
</html>


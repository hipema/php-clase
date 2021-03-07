<?php
    include "class/Menu.php";
    include "includes/autentificacion.php";

    // Aquí comprobamos la acción a realizar (Añadir Película)
    if ($_POST['annadirpelicula']){
        // llamamos a añadir
        // var_dump($_POST);
        $arrayAnnadir = [
            "titulo" => $_POST['titulo'], 
            "anyo" => $_POST['anyo'],
            "edad_recomendada" => $_POST['edad_recomendada'],
            "director" => $_POST['director'],
            "generos" => $_POST['generos']
        ];
        $peliculas->set($arrayAnnadir);
        $listadoPeliculas = $peliculas->getAll();
    }

    // Comprobamos la acción para Añadir a me gusta
    if ($_GET['accion'] == "favorito" && $_SESSION['rol'] == 3){
        // llamar a guardar favorito
        $peliculas->annadirAFavorito($_GET['id_pelicula'], $_SESSION['id']);
    } else if ($_GET['accion'] == "nofavorito" && $_SESSION['rol'] == 3){
        $peliculas->quitarFavorito($_GET['id_pelicula'], $_SESSION['id']);
    }

    $vista = "principal";
    
    if ($_GET['vista']){
        $vista = $_GET['vista'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manolohidalgo_"/>
   <script src="objet"></script>
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>

    <!-- Menú que dependerá del tipo de usuario 
            Invitados -> Estás logueado como Invitado
            Registrados -> Bienvenido nombreUsuario / Ver favoritos
            Moderadores -> Bienvenido nombreUsuario / Ver usuarios
            Administador -> Bienvenido nombreUsuario / Ver usuarios / Añadir Peliculas -->
    <?php //include "includes/menu.php"; ?>
    <?php 
        $datosMenu = [
            "1" => ["Ver usuarios" => "vista=verusuario",
                        "Añadir película" => "vista=annadirpelicula",
                        "Desconectar" => "sesion=off"
                        ],
            "2" => [
                        "Ver usuarios" => "vista=verusuario",
                        "Desconectar" => "sesion=off"
                        ],
            "3" => ["Ver favoritos" => "vista=verfavoritos",
                             "Desconectar" => "sesion=off"
                        ]
                    ];
        $menu = new Menu($datosMenu);
        $menu->muestraMenuUsuario($_SESSION['rol']);
    ?>

    <!-- Main superior
            Ivitados -> Formulario de registro  -->
        <?php if ($_SESSION['usuario'] == "invitado") { 
            include 'includes/registro_login.php';
        } 
        if ($vista == "principal"){

        } else if($vista == "annadirpelicula"){
            include "includes/annadirpeliculas.php";
        } else if ($vista == "verusuario"){

        } else if ($vista == "verfavoritos"){

        } ?>
        <table>
            <tr>
                <th>Titulo</th>
                <th>Año</th>
                <th>Director</th>
                <th>Edad Mín.Recomendada</th>
                <th>Generos</th>
                <th>Num. Favs</th>
                <?php if ($_SESSION['rol'] == 3) { ?>
                    <th>Añadir Favorito</th>
                <?php }?> 
            </tr>
            <!-- A partir de aquí es el foreach que lee todas las peliculas -->
            <?php
            foreach ($listadoPeliculas as $peliculaSeleccionada) { ?>
                <tr>
                    <td><?php echo $peliculaSeleccionada['titulo'];?></td>
                    <td><?php echo $peliculaSeleccionada['anyo'];?></td>
                    <td><?php echo $peliculaSeleccionada['director'];?></td>
                    <td><?php echo $peliculaSeleccionada['edad_recomendada'];?></td>
                    <td>
                        <?php 
                        $generosPeliculas = $peliculas->buscarGeneros($peliculaSeleccionada['id']);
                        foreach ($generosPeliculas as $generoSeleccionado) {
                            echo $generos->obtenerGeneroPorId($generoSeleccionado['id_genero']).'<br/>';
                        }
                        ?></td>
                    <td> <?php echo $peliculas->buscarNumeroFavoritos($peliculaSeleccionada['id']); ?></td>
                    <?php if ($_SESSION['rol'] == 3) {?>
                        <td>
                            <?php if ($peliculas->comprobarSiFavorito($peliculaSeleccionada['id'], $_SESSION['id'])){ ?>
                                    <a href="index.php?id_pelicula=<?php echo $peliculaSeleccionada['id'];?>&accion=nofavorito">Quitar</a>
                                <?php } else { ?>
                                    <a href="index.php?id_pelicula=<?php echo $peliculaSeleccionada['id'];?>&accion=favorito">Me mola</a>
                            <?php } ?>
                        </td>
                    <?php } ?>
                <tr>
            <?php }?>
        </table>
        
    <!-- Main medio
            Ivitados -> Listado de películas //
            Registrados -> Listado de películas y opción añadir favoritos
            Modeador -> Listado de películas y editar
            Administrador -> Listado de películas y opación de eliminar película o editar-->

    
    
</body>
</html>

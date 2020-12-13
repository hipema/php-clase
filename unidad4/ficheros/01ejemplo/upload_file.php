<?php
/**
 * @author: manolohidalgo_
 */

 // print_r($_FILES); // utilizamos esto para comprobar que recibimos un array con la información.
    $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "application/pdf"))
        && ($_FILES["file"]["size"] < 2000000)
        && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br/>";
            }
            else {
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "Stored in: " . $_FILES["file"]["tmp_name"];
            }
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
                }
                else {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                "upload/" . $_FILES["file"]["name"]);
                echo "Stored in: " . "upload/" . date(ymd). $_FILES["file"]["name"];
                $valor = $_FILES["file"]["name"];
                mostrarPagina($valor);
                } 
    } else {
        echo "Invalid file";
    }

    function mostrarPagina($url){
        echo '<h2>Imagen subida</h2>';
        echo '<img src="upload/'.$url.'" />';

        echo '<h3>Imagenes del directorio</h3>';
        $ficheros  = scandir("./upload");
        foreach ($ficheros as $archivo) {
            if ($archivo != "." && $archivo != ".." && $archivo != $url){
                echo '<img src="upload/'.$archivo.'" /><p></p>';
            }
        }

    }
    
 ?>
<?php

include_once "config.php";

function conectaDB()
{
    try {
        $dsn = "mysql:host=db;dbname=superheroe";
        $db =new PDO($dsn, 'root', '123456');
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , 'SET NAMES utf8');
        return($db);
    } catch (PDOException $e) {
        echo "Error conexión";
        exit();
    }
}
$db = null;
?>
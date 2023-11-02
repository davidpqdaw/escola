<?php
    require "config.php";
    include "src/db.php";
    require 'src/render.php';
    //conexion de la base de datos
    $db = connect($dbhost, $dbname, $dbpass, $dbuser);
    //si existe el post de email y nombre y edad y dni son diferente a null cambiar la informacion de la base de datos
    if(isset($_POST["email"]) and isset($_POST["nombre"]) and $_POST["edad"]!=null and $_POST["dni"]!=null){
        cambiarUsuario($prueba = $_POST["email"], $_POST["nombre"], $_POST["apellido"], $_POST["edad"], $_POST["dni"], $_SESSION["id_usuarios"], $db);
    }
    //eliminar todas las sesiones activas
    session_destroy();
    header('Location:?');
?>
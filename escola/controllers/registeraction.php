<?php
require "config.php";
include "src/db.php";
require 'src/render.php';
//conexion de la base de datos
$db = connect($dbhost, $dbname, $dbpass, $dbuser);
//comprueba si existen esas varibles
if(isset($_POST['email']) and isset($_POST['password']) and isset($_POST['nombre']) and isset($_POST['apellido'])){
    //comprueba si existe el correo en la base de datos 
    //si no existe en la base de datos convierte la password a hash y añade toda la informacion a la base de datos
    if(existecorreo($_POST['email'], $db)==false){
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        //Comprueba si id es alumno o profesor
        if($_POST['id_rol']=="Alumno"){
            $rol=2;
        }else{
            $rol=1;
        }
        $add = añadirUsuario($_POST['email'], $pass, $_POST['nombre'], $_POST['apellido'], $rol, $db);
        $user=conseguirdatosUsuario($_POST['email'], $db);
        if($_POST['id_rol']=="Alumno"){
            añadirAlumno($user[0]['id_usuarios'], $db);
        }else{
            añadirProfesor($user[0]['id_usuarios'], $db);
        }
        print render('login',['title' => 'Login-render']);
        //$info = "Usuario añadido correctamente";
    }else{
        print render('register',['title' => 'Register-render']);
        print "<p>El correo ya existe</p>";
    }
    
}else{
    print render('register',['title' => 'Register-render']);
    $info = "Algo no ha ido bien";
}
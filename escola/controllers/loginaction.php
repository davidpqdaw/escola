<?php
    require "config.php";
    include "src/db.php";
    require 'src/render.php';
    //Si no esta iniciado el session_start que lo inicie
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    //conexion a la base de datos
    $db = connect($dbhost, $dbname, $dbpass, $dbuser);
    //si existe email y password si sale falso vuelve al login printando que llenes todos los campos
    if(isset($_POST['email']) or isset($_POST['password'])){
        //valida comparando con la base de datos el email y el password
        $check = validarUsuario($_POST['email'], $_POST['password'], $db);
        //si check es true creara variables de sesión con los diferentes campos de la base de datos
        //en caso de dar false redirige otra vez al login añadiendo que el login es incorrecto
        if($check == true){
            //si existe existe recordar crea las coockies de email password y coockies login
            if(isset($_POST['recordar'])){
                setcookie('email', $_POST['email'], time() + (3600), "/");
                setcookie('password', $_POST['password'], time() + (3600), "/");
                setcookie('cookieLogin', true, time() + (3600), "/");
            }
            $user=conseguirdatosUsuario($_POST['email'],$db);
            $_SESSION["email"]=$user[0]['email'];
            $_SESSION["nombre"]=$user[0]['nombre'];
            $_SESSION["apellido"]=$user[0]['apellido'];
            $_SESSION["edad"]=$user[0]['edad'];
            $_SESSION["dni"]=$user[0]['dni'];
            $_SESSION["id_rol"]=$user[0]['id_rol'];
            $_SESSION["id_usuarios"]=$user[0]['id_usuarios'];
            header('Location:?url=dashboard');
        }else{
            print render('login',['title' => 'Login-render']);
            print "Login incorrecto";
        }
    }else{
        header('Location:?url=login');
        print "Llena todos los campos";
    }
?>
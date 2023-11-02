<?php
function connect($dbhost, $dbname, $dbpass, $dbuser): ?PDO{
    try{
        //Crear connexio
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf8mb4', $dbuser, $dbpass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    } catch (PDOException $e){
        return "Error: ". $e->getMessage();
        
    }
}

function añadirUsuario(string $email, string $password, string $nombre, string $apellido, $rol,PDO $db){   
    try{
        $sql = 'INSERT INTO usuarios (email, password, nombre, apellido, id_rol) VALUES (:email, :password, :nombre, :apellido, :rol)';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':rol', $rol);
        $stmt->execute();
    }catch(PDOException $e){
        return "Error: ". $e->getMessage();
    }
}

function existecorreo(string $email, PDO $db){
    $stmt = $db->prepare("SELECT email FROM `usuarios` WHERE `email` = :email;");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $query;
}

function validarUsuario(string $email, string $password, PDO $db):bool{
    try{
        $stmt = $db->prepare("SELECT email, password FROM `usuarios` WHERE `email` = :email LIMIT 1;");
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        return $e->getMessage();
    }
    if(count($row)!=0){
        if($row[0]['email'] == $email and password_verify($password, $row[0]['password'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function conseguirdatosUsuario(string $email, PDO $db){
    try{
        $stmt = $db->prepare("SELECT * FROM `usuarios` WHERE `email` = :email LIMIT 1;");
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        return $e->getMessage();
    }
    return $row;
}

function cambiarUsuario(string $email, string $nombre, string $apellido, int $edad, string $dni, int $id_usuarios, PDO $db){   
    try{
        $sql = 'UPDATE usuarios SET email = :email, nombre = :nombre, apellido = :apellido, edad = :edad, dni = :dni where id_usuarios = :id_usuarios;';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':id_usuarios', $id_usuarios);
        $stmt->execute();
        return $stmt->execute();
    }catch(PDOException $e){
        return "Error: ". $e->getMessage();
    }
}

function añadirAlumno($id_usuarios, PDO $db){   
    try{
        $sql = 'INSERT INTO alumnos (id_usuarios) VALUES (:id_usuarios)';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_usuarios', $id_usuarios);
        $stmt->execute();
    }catch(PDOException $e){
        return "Error: ". $e->getMessage();
    }
}

function añadirProfesor($id_usuarios, PDO $db){   
    try{
        $sql = 'INSERT INTO profesores (id_usuarios) VALUES (:id_usuarios)';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_usuarios', $id_usuarios);
        $stmt->execute();
    }catch(PDOException $e){
        return "Error: ". $e->getMessage();
    }
}
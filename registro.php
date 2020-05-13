<?php

if(isset($_POST)){
    
    //CARGAR LA CONEXION A LA BASE DE DATOS
    require_once 'includes/conexion.php';

    //INICIAR SECION
    if(!isset($_SESSION)){
    session_start();
    }
     //recoger valores del formulario de registro 
     $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST["nombre"]) : false;
     $apellidos = isset($_POST["apellidos"]) ? mysqli_real_escape_string($db, $_POST["apellidos"]) : false;
     $email = isset($_POST["email"]) ? mysqli_real_escape_string($db, trim($_POST["email"])) : false;
     $password = isset($_POST["password"]) ? mysqli_real_escape_string($db, $_POST["password"]) : false;
     
     //Array de errores
     $errores = array();
     
     //validar datos antes de guardarlos en la base de datos
     
     //Validar NOMBRE
         if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
         $nombre_validado = true;
     }else{
         $nombre_validado = false;
         $errores ['nombre'] = "El nombre no es valido";
     }
     
     //Validar APELLIDOS
          if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
         $apellidos_validado = true;
     }else{
         $apellidos_validado = false;
         $errores ['apellidos'] = "Los apellidos no son validos";
     }
     
     //Validar EMAIL
          if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
         $email_validado = true;
     }else{
         $email_validado = false;
         $errores ['email'] = "El email no es valido";
     }
     
     //Validar CONTRASEÑA
          if(!empty($password)){
         $password_validado = true;
     }else{
         $password_validado = false;
         $errores ['password'] = "La contraseña esta vacia";
     }
     
     $guardar_usuario = false;
     
     if(count($errores) == 0){
         
         $guardar_usuario = true;
         //CIFRAR LA CONTRASEÑA 
         $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' =>4]);
     
         //INSERTAR USUARIO EN LA BASE DE DATOS
         $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', 'user', CURDATE());";
         $guardar = mysqli_query($db, $sql);
         
         if($guardar){
             $_SESSION['completado'] = "Registro completado con exito";
         }else{
              $_SESSION['errores']['general'] = "Fallo al guardar usuario";
         }
         
         }else{
         $_SESSION['errores'] = $errores;
     }
     
     
     header('location: index.php');
}

?>
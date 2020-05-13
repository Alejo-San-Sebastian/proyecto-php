<?php

if(isset($_POST)){
    //CARGAR LA CONEXION A LA BASE DE DATOS
    require_once 'includes/conexion.php';
    
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']): FALSE ;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']): FALSE ;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria']: FALSE ;
    $usuario = $_SESSION['usuario']['id'];
    
 //Array de errores
    $errores = array();
     
 //Validar NOMBRE
    if(empty($titulo)){
       $errores ['titulo'] = "El titulo no es valido";
    }
    if(empty($descripcion)){
       $errores ['descripcion'] = "La descripcion no es valida";
    }
    if(empty($categoria) && !is_numeric($categoria)){
       $errores ['categoria'] = "La categoria no es valida";
    }
    
    if(count($errores) == 0){
        if(isset($_GET['editar'])){
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql = "UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', categoria_id=$categoria ".
                   " WHERE id= $entrada_id AND usuario_id = $usuario_id";
        }else{
            $sql = "INSERT INTO entradas VALUES (NULL, '$usuario', '$categoria', '$titulo', '$descripcion', CURDATE());";
        }
        $guardar = mysqli_query($db, $sql);
        
        header("Location: index.php");
    } else {
        $_SESSION ['errores_entrada'] = $errores;
        if(isset($_GET['editar'])){
             header("Location: editar-entrada.php?id=".$_GET['editar']);
        }else{
             header("Location: crear-entradas.php");
        }
    }
}
?>
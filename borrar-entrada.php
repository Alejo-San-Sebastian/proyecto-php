<?php
require_once 'includes/conexion.php';

if(isset($_SESSION['usuario']) && $_GET['id']){
    
    $entrada_id = $_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];
    
    $sql = "DELETE FROM entradas WHERE usuario_id = $usuario_id AND $entrada_id";
    $borrar = mysqli_query($db, $sql);
}

header("Location: index.php");
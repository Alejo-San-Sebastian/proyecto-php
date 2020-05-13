<?php

#CONEXION#
    
$servidor = "localhost";
$usuario = "root";
$password = "";
$basededatos = "prueba";
$db = mysqli_connect($servidor, $usuario, $password, $basededatos );

mysqli_query($db, "SET NAMES 'utf8'");

//INICIAR SECION
if(!isset($_SESSION)){
    session_start();
}
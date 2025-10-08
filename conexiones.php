<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moto_guia";

// crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);   

//verificar conexión
if ($conn->connect_error){
  die("conexión fallida: " . $conn->connect_error);
}
?>
<?php

$servername = "localhost";
$username = "fazendavertical";
$password = "fazenda123";
$dbname = "fazendavertical";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} 



?>
<?php

$servername = "localhost";
$username = "id21283713_greenworld";
$password = "_Greenworld123";
$dbname = "id21283713_fazendas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} 



?>
<?php 
    // Conexão Servidor
    $host = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bdveterinaria";

    $conn = new mysqli( $host, $user, $pass, $banco);
    if ($conn->connect_error) {
        die ("Falha na conexão " . $conn->connect_error);
    }
?>
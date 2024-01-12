<?php

// Connection to the database using PDO
try {
    // Database connection parameters
    $host = "localhost";
    $username = "teoBacher";
    $password = "teo";
    $databaseName = "gestionImmo";
    $port = "3306";

    // Creating a PDO instance for connecting to the database
    $pdo = new PDO("mysql:host=$host;dbname=$databaseName;port=$port", $username, $password);

    // Configuring PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // In case of a connection error, display an error message and terminate the script
    echo "Database connection error: " . $e->getMessage();
    die();
}

?>
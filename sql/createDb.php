<?php 

// connexion
require 'connDb.php';

// Create user
$pdo->exec("CREATE TABLE friends(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    firstName VARCHAR(45) NOT NULL,
    lastName VARCHAR(45) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Tables : FRIENDS';
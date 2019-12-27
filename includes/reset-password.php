<?php
require_once __DIR__.'/../src/DbConnection.php';


$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    UPDATE clients
    SET password =?
    WHERE email=?;

SQL
);

if (false === $statement->execute([ 
    $new_password,
    $email
])) { 
    throw new RuntimeException('Erreur avec la requête !');
}
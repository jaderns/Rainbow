<?php
require_once __DIR__.'/../src/DbConnection.php';

$currentdate = date ("U");

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT *
    FROM password_reset
    WHERE password_selector=?
    AND password_expires >=?;

SQL
);

if (false === $statement->execute([ 
    $selector,
    $currentdate
])) { 
    throw new RuntimeException('Erreur avec la requête select!');
}

if( null === $ligne = $statement->fetch()) {
    echo "You need to resubmit your request didnt work";
} else { 
    $tokencheck = password_verify(hexdec($validator),$ligne['password_validator']);  
    if (false == $tokencheck) {
        echo "You need to resubmit your request";
    }
    elseif (true == $tokencheck) {
        $token_email = $ligne['password_email'];
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
    $token_email
])) { 
    throw new RuntimeException('Erreur avec la requête update!');
    }
    }

}


<?php

$pdo = new PDO($dsn,$user,$password);
$statement = $pdo->prepare(
<<<SQL
    SELECT client_id, created_at, state, id
    FROM commands;
SQL
);
if (false === $statement->execute()) {
    throw new RuntimeException('Erreur avec la requête !');
}

$commands = [];
while ($ligne = $statement->fetch()) {
    $commands[] = new Command(
        $ligne['id'],
        $ligne['state'],
        new \DateTimeImmutable($ligne['created_at']),
        $ligne['client_id']
    );
}

return $commands;

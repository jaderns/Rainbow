<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Commande.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT email, name, password, address, created_at, statut
    FROM clients
SQL
);

if (false === $statement->execute()) { 
    throw new RuntimeException('Erreur avec la requête !');
}

$clients = [];
while ($ligne = $statement->fetch()) {
    $clients[] = new App\Model\Client(
        $ligne['email'],
        $ligne['password'],
        $ligne['name'],
        $ligne['address'],
        new DateTimeImmutable($ligne['created_at']), 
        $ligne['statut']);
}

foreach ($clients as $value)
{
    echo "<p>".$value->email()." ";
    echo $value->name()." ";
    echo $value->address()."<p/>"; 
    echo '<a href="">Suppr</a>';

};

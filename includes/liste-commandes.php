<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Commande.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT id_commande, id_client, id_produit, etat, created_at
    FROM commandes
SQL
);

if (false === $statement->execute()) { 
    throw new RuntimeException('Erreur avec la requête !');
}

$commandes = [];
while ($ligne = $statement->fetch()) {
    $commandes[] = new App\Model\Commande(
        $ligne['id_commande'],
        $ligne['id_client'],
        $ligne['id_produit'],
        $ligne['etat'],
        new \DateTimeImmutable($ligne['created_at'])
    );
}

foreach ($commandes as $value)
{
    echo "<p>".$value->id_commande()." ";
    echo $value->id_client()." ";
    echo $value->id_produit()." ";
    echo $value->etat()."<p/>";
};

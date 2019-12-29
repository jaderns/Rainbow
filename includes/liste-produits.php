<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Produit.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT id_produit, photo, titre, description
    FROM produits
SQL
);

if (false === $statement->execute()) { 
    throw new RuntimeException('Erreur avec la requête !');
}

$produits = [];
while ($ligne = $statement->fetch()) {
    $produits[] = new App\Model\Produit(
        $ligne['id_produit'],
        $ligne['photo'],
        $ligne['titre'],
        $ligne['description']
    );
}

foreach ($produits as $value)
{
    echo "<p>".$value->id_produit()." ";
    echo '<img src="/rainbow/photos/"'.$value->photo().'> ';
    echo $value->titre()." ";
    echo $value->description()."<p/>";
};

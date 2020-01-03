<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Commentaire.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT id_client, created_at, contenu, score
    FROM commentaires
    ORDER BY created_at DESC;
SQL
);

if (false === $statement->execute([])) { 
    throw new RuntimeException('Erreur avec la requête !');
}

    
//liste commentaires
$commentaires = [];
while ($ligne = $statement->fetch()) {
    $commentaires[] = new App\Model\Commentaire(
        $ligne['id_client'],
        new DateTimeImmutable($ligne['created_at']), 
        $ligne['contenu'],
        $ligne['score']);
}


// //supprimer client

// if(isset($_GET['delete_client'])) {
//     $email=$_GET['delete_client'];
    
// // echo "Voulez vous supprimer le client ".$email=$_GET['delete_client']."?";
// //  <a href="profile-pro.php?delete_client=<?=$value->email()&button=oui">Oui</a>
// //         <a href="profile-pro.php">Non</a> </form><?php
// // } 

// // if (isset($_GET['button'])) {
    
// $pdo = \App\DbConnection::current();     
// $statement = $pdo->prepare(
// <<<SQL
//     DELETE FROM clients
//     WHERE email=?;
// SQL
// );
// if (false === $statement->execute([$email])) { 
//     throw new RuntimeException('Erreur avec la requête de suppression!');
// }
// header('location:profile-pro.php');

// }

// //modif client 
// if(isset($_GET['edit'])) {
//     $email=$_GET['edit'];
// header("location:../admin/update-user.php?edit=$email");



// }

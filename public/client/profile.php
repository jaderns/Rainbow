 <?php 
 
use App\Header;
use App\SessionManager;

require_once __DIR__.'/../../src/SessionManager.php';


if(null ==$client = SessionManager::loggedClient()) {
    header('location: login.php');
    exit(); 
}

?>

<html>
    <body>
        <div class="container">
            <?php 
require_once __DIR__.'/../../public/header.php';
?>
            <div class="item item4">
                <h2>Mes informations</h2>
                <?php 

echo "<p>Email: ".$client->email()."</p>";
echo "<p>Mot de passe: ************</p>";
echo "<p>Nom: ".$client->name()."</p>";
echo "<p>Adresse: ".$client->address()."</p>"; 
echo "<a href='../admin/update-user.php?edit=".$client->email()."'>Modifier mon compte</a>"

?>

            </div>

            <div class="item item7">
                
<h2>Mes commandes</h2>

<?php
$email = $client->email();

require __DIR__.'/../../includes/commande-par-client.php';

foreach ($commandes as $value)
{
    echo "<p>".$value->no_commande()." ";
    echo $value->id_client()." ";
    echo $value->id_produit()." ";
    echo $value->created_at()->format('d-m-Y')." ";
    echo $value->etat()." ";
    echo '<a href="profile-pro.php?delete_commande='.$value->no_commande().'">Suppr</a><p/>';

};
?>

            </div>

            <div class="item item8">

<?php 

require_once __DIR__.'/../../public/footer.php';
?>
</div>

            


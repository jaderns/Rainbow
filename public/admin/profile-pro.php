<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>

<?php
 
 use App\Header;
 use App\SessionManager;
 
 require_once __DIR__.'/../../src/SessionManager.php';
 require __DIR__.'/../../includes/liste-commandes.php';
 
 
 if(null ==$client = SessionManager::loggedClient()) {
     header('location: ../client/login.php');
     exit(); 
 }
 ?>
 <html>
 <body>
     <div class="container">
         <?php 
require_once __DIR__.'/../../public/header.php';
?>
         <div class="flex-column row">
 <h2 class="offset-lg-1 col-lg-11">Commandes</h2>
<div class="offset-lg-2 col-lg-8 ">
<?php 


foreach ($commandes as $value)
{
    echo "<p>".$value->no_commande()." ";
    echo $value->id_client()." ";
    echo $value->id_produit()." ";
    echo $value->created_at()->format('d-m-Y')." ";
    echo $value->etat()." ";
    echo '<a href="profile-pro.php?delete_commande='.$value->no_commande().'">Suppr</a><p/>';

    if (0 === $value->etat())
    echo '<form method="post" action="profile-pro.php?update_status='.$value->no_commande().'">
    <input type="hidden" name="email" value="'.$value->id_client().'"><select name="statut" onchange="this.form.submit()">
    <option value="0" selected>Commandé</option>
    <option value="1">Envoyé</option>
    </select>
    </form>';
    else echo '<form method="post" action="profile-pro.php?update_status='.$value->no_commande().'">
    <input type="hidden" name="email" value="'.$value->id_client().'"><select name="statut" onchange="this.form.submit()">
    <option value="0">Commandé</option>
    <option value="1" selected>Envoyé</option>
    </select>
    </form>';
};

?>
</div>
</div>
<div class="item item5">
<h2 class="offset-lg-1 col-lg-11">Utilisateurs</h2>
<div class="offset-lg-2 col-lg-8 ">
<?php 
require __DIR__.'/../../includes/liste-clients.php';

echo '<a href="../client/signup.php?new=1">Nouveau client</a>';

foreach ($clients as $value)
{
    echo "<p>".$value->email()." ";
    echo $value->name()." ";
    echo $value->address()." "; 
    echo '<a href="profile-pro.php?edit='.$value->email().'"> Edit </a>';
    echo '<a href="profile-pro.php?delete_client='.$value->email().'">Suppr</a><p/>';

};

?>
</div>
</div>

<div class="item item6">
<h2 class="offset-lg-1 col-lg-11">Commentaires</h2>
<div class="offset-lg-2 col-lg-8 ">
<?php 
require __DIR__.'/../../includes/liste-commentaires.php';

foreach ($commentaires as $value)
{
    echo "<p>".$value->id_client()." ";
    echo $value->created_at()->format('d-m-Y')." ";
    echo $value->contenu()." ";
    echo $value->score()." ";
    echo '<a href="profile-pro.php?delete_commentaire='.$value->created_at()->format('Y-m-d H:i:s').'">Suppr</a><p/>';
    };


?>
</div>
</div>

<div class="item item7">
<h2 class="offset-lg-1 col-lg-11">Produits</h2>
<div class="offset-lg-2 col-lg-8 ">

<?php  
require __DIR__.'/../../includes/liste-produits.php';

foreach ($produits as $value)
{
    echo "<p>".$value->id_produit()." ";
    echo '<img style="width:75px;height:56px;border:solid 1px black" src="/../photos/'.$value->photo().'">';
    echo $value->titre()." ";
    echo $value->description()."<p/>";
   
};

?>


</div>
</div>

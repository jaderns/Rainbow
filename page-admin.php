<!DOCTYPE html>
<html lang="fr">
<head>
<link <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


<title>Page admin</title>
<meta http-equiv="Content-Type" content="text/html;
charset=utf-8" />
    </head>
<body>



<div class="container">
  <div class="row">
     <div class="col-sm-3">
     <img
    src="images/photo1.jpg" 
    alt="[image commende 1]"
    height="50px" 
    width="50px" 
/>
     
     </div>

     <div class="col-sm-5">
  <h3> Description </h3>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at libero vel sapien bibendum tempor a in nunc. Donec dui libero, pulvinar sit amet arcu et, maximus suscipit sapien. </p>
     </div>
  

	<h2>base de donnée</h2>
	<hr />

	<?php

  include('commande.php');

	try
	{
		// Database connection and error verification
    $base = new PDO('mysql:host=127.0.0.1;dbname=rainbow-project', 'root', '');
		//***HERE MIGHT BE YOUR CODE
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connexion ok. <br />";

        $tableau_retour= $myman->getContenueParDate();


		if (empty($tableau_retour))
		{
			echo 'Aucune commande en attente.';
		}
		else {
			foreach ($tableau_retour !== null) { 

          //   $requete = 'SELECT Titre, Date, Commentaire, Photo, Id FROM `monblog`';
         //   $resultat = $base->query($requete);
           //  while ($ligne = $resultat->fetch()) {
           echo $ligne['titre'].'<br />  '.$ligne['description'].'<br /> '.$ligne['image'].' <br /><br />';
            echo '<img src="./images/'.$ligne['image'].'"'.'width="370" border="0" /></div><br /><br />';
            echo 'commander par :' .$ligne['identifiantclient'].'<br />  date de la commande : '.$ligne['created_at'].' <br /><br />';
            echo '<hr /><br />';

            ?>
  <form action="page-admin.php" method="POST" enctype="multipart/form-data">

<input type="submit" name="okay" value="Commande envoyer" />
<input type="submit" name="suppr" value="Suprimer la commande" />
</form><br />


            <?php 
                }
			}
		

  
  if ($_POST["okay"] !== null){

    return changementdetatvalider($etat);

  }

  if ($_POST["suppr"] !== null){

    return changementdetatsuppr($etat);

  }
 
	catch(Exception $e)
	{
		//message in case of error

		die('Erreur : '.$e->getMessage());
	}
  finally {
  $base = null; //fermeture de la connexion
  }
	?>
	<br />
	
</body>
</html>




















  <div class="col-sm-4">
  <input type="submit" name="ok" value="Envoyer">
  <input type="submit" name="ok" value="Envoyer">
     </div>
  </div>

  <div class="row">
    <div class="col-sm-*"></div>
    <div class="col-sm-*"></div>
    <div class="col-sm-*"></div>
  </div>
  </div>



  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>

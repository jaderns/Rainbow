<script type="text/javascript">
function my_display() {
  var x = document.getElementById("form_comment");
    x.style.display = "block";
}
function hide() {
    var x = document.getElementById("form_comment");
    x.style.display = "none";
}
</script>
<style> 
#button_comment{
    display:block;
}
#form_comment{
    display:none;
}
</style>

<?php 
include('header.php');
?>

<h1>Produit</h1>


<h2>Commentaires</h2>

<button id="button_comment" onclick="my_display()">Nouveau commentaire</button>
<div id="form_comment">
<form method="post">
<input type="hidden" name="email" value="<?=$client->email();?>">
<textarea name="contenu" cols="30" rows="10" required></textarea>
<select name="score">
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5" selected >5</option></select>
<input type="submit" name="submit" value="commenter" <?php if ($_POST['contenu'] ?? null) { ?>onclick="hide()"><?php ; }?>>
</form>
</div>

<?php
if (isset($_POST['submit'])){
    require __DIR__.'/../includes/nouveau-commentaire.php';
$email = null;
$contenu = null;
$score = null;
}

require __DIR__.'/../includes/liste-commentaires.php';


foreach ($commentaires as $value)
{
    echo "<p>".$value->id_client()." ";
    echo $value->created_at()->format('d-m-Y')." ";
    echo $value->contenu()." ";
    switch ($value->score()) {
        case 1:
            echo '●○○○○';
            break;
        
        case 2:
            echo '●●○○○';
            break;

        case 3:
            echo '●●●○○';
            break;
        
        case 4:
            echo '●●●●○';
            break;
        case 5:
            echo '●●●●●';
            break;
    }
    };

?>


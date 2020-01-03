<?php
require_once __DIR__.'/../src/DbConnection.php';
require_once __DIR__.'/../src/Model/Commande.php';

$pdo = \App\DbConnection::current(); 
$statement = $pdo->prepare(
<<<SQL
    SELECT email, name, password, address, created_at, statut
    FROM clients
    WHERE statut=?
    ORDER BY created_at DESC;
SQL
);

if (false === $statement->execute([0])) { 
    throw new RuntimeException('Erreur avec la requête !');
}
 ?>



<!-- <?php 
//nouveau client
// if(isset($_GET['new'])) {?>
<input type="text" class="form-control" id="exampleInputFullname" name="name" placeholder="Name" required>
<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" required>

<?php //if (isset($error['email'])): ?>

<p><? //$error['email'] ?></p>
<?php //endif; ?>
<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
<?php //if (isset($error['password'])): ?>
<p><? //$error['password'] ?></p>
<?php //endif; ?>
<input type="password" class="form-control" id="exampleInputPassword2" name="cpassword" placeholder="Confirm Password" required>
<input type="text" class="form-control" id="exampleAddress" name="address" placeholder="address" required>
<button type="submit" name="submit" class="btn btn-default">Submit</button>
    --><?php        
//} 



//liste clients
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



//supprimer client

if(isset($_GET['delete_client'])) {
    $email=$_GET['delete_client'];
    
// echo "Voulez vous supprimer le client ".$email=$_GET['delete_client']."?";
//  <a href="profile-pro.php?delete_client=<?=$value->email()&button=oui">Oui</a>
//         <a href="profile-pro.php">Non</a> </form><?php
// } 

// if (isset($_GET['button'])) {
    
$pdo = \App\DbConnection::current();     
$statement = $pdo->prepare(
<<<SQL
    DELETE FROM clients
    WHERE email=?;
SQL
);
if (false === $statement->execute([$email])) { 
    throw new RuntimeException('Erreur avec la requête de suppression!');
}
header('location:profile-pro.php');

}

//modif client 
if(isset($_GET['edit'])) {
    $email=$_GET['edit'];
header("location:../admin/update-user.php?edit=$email");



}

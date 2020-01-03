<?php 

use App\Model\Client;
use App\SessionManager;

require_once __DIR__.'/../../src/SessionManager.php';

$error = [];
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$cpassword = $_POST['cpassword'] ?? null;
$name = $_POST['name'] ?? null;
$address = $_POST['address'] ?? null;

if (null !== $email &&
false === filter_var($email, FILTER_VALIDATE_EMAIL)
) {
$error['email'] = "L'identifiant fourni n'est pas un email valide !\n";
}
if ($password !== $cpassword) {
    $error['password'] = "La confirmation du mot de passe ne correpond pas !\n";
}

if (!isset($error['email']) && null !== $email) {
    $client = require __DIR__.'/../../includes/client-par-email.php';
    if ($client instanceof Client) {
        $error['email'] = 'Email déjà utilisé !';
    }
}

if (count($error) === 0 && null !== $email) {
    $client = require __DIR__.'/../../includes/nouveau-client.php';
    if ($client instanceof Client) {
        if (1 == $_GET['new']) {
            header('location: ../admin/profile-pro.php');
            exit(); 
        } else {
            SessionManager::loginClient($client);
            header('location: ../index.php');
            exit();
        }
    } else {
        $error['enregistrement'] = 'Erreur pendant enregistrement !';
    }
    }

?>


<div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Registration Form</h3>
                    <?php if(!empty($arr_message['msg'])) { ?>
                        <div class="alert <?php echo $arr_message['class']; ?>"><?php echo $arr_message['msg']; ?></div>
                    <?php } ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="exampleInputFullname">Name</label>
                            <input type="text" class="form-control" id="exampleInputFullname" name="name" placeholder="Name" value="<?= $name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" value="<?= $email; ?>" required>
                            <?php if (isset($error['email'])): ?>
                                <p><?= $error['email'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                            <?php if (isset($error['password'])): ?>
                                <p><?= $error['password'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" name="cpassword" placeholder="Confirm Password" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputAddress">Address</label>
                            <input type="text" class="form-control" id="exampleAddress" name="address" placeholder="address" value="<?= $address; ?>" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                    
        
                    </form>
                </div>
            </div>
        </div>
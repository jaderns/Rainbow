<?php 

use App\Model\Client;
use App\SessionManager;


$email=$_GET['edit'];
$client = require __DIR__.'/../../includes/client-par-email.php';

?>



<h3>Registration Form</h3>
<?php if(!empty($arr_message['msg'])) { ?>
    <div class="alert <?php echo $arr_message['class']; ?>"><?php echo $arr_message['msg']; ?></div>
<?php } ?>
<form method="post">
    <div class="form-group">
        <label for="exampleInputFullname">Name</label>
        <input type="text" class="form-control" id="exampleInputFullname" name="name" placeholder="Name" value="<?= $client->name(); ?>" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" value="<?= $client->email(); ?>" required>
        <?php if (isset($error['email'])): ?>
            <p><?= $error['email'] ?></p>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="exampleInputAddress">Address</label>
        <input type="text" class="form-control" id="exampleAddress" name="address" placeholder="address" value="<?= $client->address(); ?>" required>
    </div>

    <button type="submit" name="submit" class="btn btn-default">Submit</button>


</form>

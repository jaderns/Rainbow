 <?php 
 
use App\Header;
use App\SessionManager;

require_once __DIR__.'/../../src/SessionManager.php';


if(null ==$client = SessionManager::loggedClient()) {
    header('location: login.php');
    exit(); 
}

require_once __DIR__.'/../../public/header.php';

?>

<h1>Profile</h1>
<p>Header ne redirige pas correctement vers index</p>


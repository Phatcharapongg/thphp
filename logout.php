<?PHP
session_start();
session_destroy();
require('config/server.php');

header("location: " . $_SESSION['uri'] ."/". $path);
exit(0);
?>
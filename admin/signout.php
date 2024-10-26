<?php 
session_start();
setcookie("cookie_username","",time()+ (86400 * 30), "/");
	setcookie("cookie_password","",time()+ (86400 * 30), "/");
	unset($_COOKIE["cookie_username"]);
if(isset($_SESSION['auth_username']) && (!empty($_SESSION['auth_username']))){
        
	session_unset();    
    session_destroy();
	setcookie("cookie_username","",time()+ (86400 * 30), "/");
	setcookie("cookie_password","",time()+ (86400 * 30), "/");
	unset($_COOKIE["cookie_username"]);
	unset($_SESSION['auth_id']);
	unset($_SESSION['auth_username']);
    //setcookie ("cookie_username","kill_cookies",time()+ (86400 * 30), "/");
	
	header('location: ../index.php');
}



?>
<?php
// set the expiration date to one hour ago
setcookie("cookie_username", "", time() - 3600);
?>
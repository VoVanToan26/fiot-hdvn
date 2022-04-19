<?php
if(isset($_POST['logoutHDVN1'])) {
    setcookie('id', '', time() -3600 , "/");
    setcookie('username', '', time() -3600 , "/");
    setcookie('full_name', '', time() -3600, "/");
    setcookie('position', '', time() -3600 , "/");
    setcookie('department', '', time() -3600 , "/");
    setcookie('email', '', time() -3600 , "/");
    setcookie('role', '', time() -3600, "/");
    setcookie('role_name', '', time() -3600, "/");
    setcookie('loggedinHDVN', '', time() -3600, "/");
	header('Location: /fiot-hdvn-a/login.php');
}
else{
	header("location: /fiot-hdvn-a/");
}
?>


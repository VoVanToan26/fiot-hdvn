<?php
if(isset($_COOKIE['loggedinHDVN']) == true) {
}
else {
     // header('Location: /kpimanagement/login.php');
    echo "<script>document.location = '/fiot-hdvn-a/login.php'</script>";
}
require_once 'config/config.php';
require_once 'vendor/Bootstrap.php';


$x = new Bootstrap();
?>

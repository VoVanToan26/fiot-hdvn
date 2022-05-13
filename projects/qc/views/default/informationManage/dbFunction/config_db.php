<?php 
//connfig db cloud

// define('DB_SERVER', 'ifsmvp.com');
// define('DB_USERNAME', 'ifsmvp_tech');
// define('DB_PASSWORD', 'ifsmvp@2021');
// define('DB_NAME', 'ifsmvp_hdvn_database');

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'ifsmvp_hdvn_database');

define('DB_SERVER', '192.168.1.100');
define('DB_USERNAME', 'hdvn');
define('DB_PASSWORD', 'Hdvn@01234');
define('DB_NAME', 'ifsmvp_hdvn_database'); 


date_default_timezone_set("Asia/Ho_Chi_Minh");
$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, 'UTF8');
?>

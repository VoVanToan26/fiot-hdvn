<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'ifsmvp.com');
define('DB_USERNAME', 'ifsmvp_tech');
define('DB_PASSWORD', 'ifsmvp@2021');
define('DB_NAME', 'ifsmvp_hdvn_database');

date_default_timezone_set("Asia/Ho_Chi_Minh");
/* Attempt to connect to MySQL database */
// public $abc = "ABCBCBASBACBASCB";
$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, 'UTF8');



$servername = "ifsmvp.com";
$username = "ifsmvp_tech";
$password = "ifsmvp@2021";
$dbname = "ifsmvp_hdvn_database";

$connectPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 

// Check connection
if($connect->connect_error){
    die("ERROR: Could not connect. " . $connect->connect_error);
}
?>
<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// define('DB_SERVER', 'localhost:81');
// define('DB_USERNAME', 'root');
// define('DB_PORT', '81');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'ifsmvp_hdvn_database');

// date_default_timezone_set("Asia/Ho_Chi_Minh");
// /* Attempt to connect to MySQL database */
// // public $abc = "ABCBCBASBACBASCB";
// $connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// mysqli_set_charset($connect, 'UTF8');


// $connectPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 

// // Check connection
// if($connect->connect_error){
//     die("ERROR: Could not connect. " . $connect->connect_error);
// }else{
//     // echo "true";
// }
?>

<?php  
session_start();
$localhost = "dedi1453.your-server.de"; 
$username = "mediab_inko"; 
$password = "QRiJccgZUN4fWszE"; 
$dbname = "mediab_db31"; 
 
// create connection 
$connect = new mysqli($localhost, $username, $password, $dbname); 
$connect->set_charset( 'utf8mb4' );
// check connection 
if($connect->connect_error) {
    die("connection failed : " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}
  
?>


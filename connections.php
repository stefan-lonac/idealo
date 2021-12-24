
<?php  
session_start();
$localhost = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "idealo_app"; 
 
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


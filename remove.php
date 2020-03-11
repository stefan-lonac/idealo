<?php include 'header.php'; ?>
 
 
</head>
<body>
<?php 

require_once 'connections.php';



if($_POST) {
	$id = $_POST['id'];

	$sql = "DELETE FROM app_table WHERE  id = {$id}";
	if($connect->query($sql) === TRUE) {
		header('Location: index.php');
	} else {
		echo "Error removing record : " . $connect->error;
	}

	$connect->close();
}

?>

</body>
<html>
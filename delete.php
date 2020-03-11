<?php 

require_once 'connections.php';

if($_GET['id']) {
	$id = $_GET['id'];

	$sql = "SELECT * FROM app_table WHERE id = {$id}";
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();

	$connect->close();
?>




<?php include 'header.php'; ?>

	<div class="delete-info">
		<h2>Do you really want to delete the product</h2>

		<form action="remove.php" method="post">

			<input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
			<button type="submit">Yes</button>
			<a href="index.php"><button type="button">No</button></a>
		</form>
	</div>
</body>
</html>

<?php
}
?>



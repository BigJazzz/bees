<?php
	$s = $_GET['s'];
	if($s = 'y') {
		$s = '<span style="color: red;">Submitted</span>';
	}
?>
<h1>Add Bee Effect</h1>
<?php echo $s; ?>
<form action="process.php" method="post">
	Effect: <input type="text" name="effect">
	Description: <input type="text" name="desc">
	<input type="submit" name="submitEffect" value="Submit">
</form>

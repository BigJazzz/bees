<?php
include_once('sql.php');
$url = $_SERVER['HTTP_REFERER'];
$url = $url.'/?s=y';
$submitEffect = $_POST['submitEffect'];
$submitBee = $_POST['submitBee'];
$post = $_POST;
$get = $_GET;
$updateID = $_GET['id'];

if($submitEffect) {
	$effectName = $_POST['effect'];
	$effectDesc = $_POST['desc'];
	$effect = mysqli_real_escape_string($conn, $effectName);
	$desc = mysqli_real_escape_string($conn, $effectDesc);
	$insertEffect = "INSERT INTO bee_effects (effect, description) VALUES ('$effect','$desc')";
	if (mysqli_query($conn, $insertEffect)) {
	    header("Location: $url");
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

if($submitBee) {
	$species = $_POST['species'];
	$beeEffect = $_POST['effect'];
	$source1 = $_POST['source1'];
	$source2 = $_POST['source2'];
	$bred = '';
	$effectSearch = array_search($beeEffect, array_column($effectarr, 'effect', 'id'));
	if($effectSearch != '') {
		$effect = $effectSearch;
	}
	$insertBee = "INSERT INTO bee_species (species, source1, source2, effect, bred, sampled) VALUES  ('$species', '$source1', '$source2', '$effect', '$bred', '$sampled')";
	if (mysqli_query($conn, $insertBee)) {
	    header("Location: $url");
	}
	else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

if($updateID) {
	$updateField = $_GET['a'];
	if($updateField == 'sampled') {
		$field = 'sampled';
	}
	else {
		$field = 'bred';
	}
	$updateCheck = $_GET['c'];
	if($updateCheck == 'n') {
		$check = '0';
	}
	else {
		$check = '1';
	}
	$update = "UPDATE bee_species SET $field='$check' WHERE id=$updateID";
	if(mysqli_query($conn, $update)) {
		echo 'Success';
	}
	else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

?>

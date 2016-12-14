<?php
	$config = parse_ini_file('config.ini');
	print_r($config);
	$servername = '';
	$username = '';
	$password = '';
	$db = '';
	$v = $_GET['v'];
	if($v == 'b') {
		$filter = " WHERE bred='1' ORDER BY sampled DESC";
	}
	elseif($v == 's') {
		$filter = " WHERE sampled='1'";
	}
	else {
		$filter = '';
	}

	// Check if sql.php is called Locally
	$local = FALSE;
	if($_SERVER['REMOTE_ADDR'] = '127.0.0.1'){
		$local = TRUE;
		//echo 'Local Reporting Mode Enabled!'."\n";
	}
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);

	if ($conn->connect_errno) {
	    die('Connection failed: ' . $conn->connect_error);
	}

	// Populate Effects
	$effectsQuery = 'SELECT id, effect, description FROM bee_effects';
	$effects = mysqli_query($conn, $effectsQuery);
	$effectarr[] = array();
	while($row = mysqli_fetch_assoc($effects)) {
		$effectarr[] = array('id'=>$row['id'], 'effect'=>$row['effect'], 'description'=>$row['description']);
	}

	// Populate Bees
	$beeQuery = 'SELECT id, name, source1, source2, effect, bred, sampled FROM bee_species'.$filter;
	$bees = mysqli_query($conn, $beeQuery);
	$beearr[] = array();
	while($row = mysqli_fetch_assoc($bees)) {
		$beearr[] = array('id'=>$row['id'], 'name'=>$row['name'], 'source1'=>$row['source1'], 'source2'=>$row['source2'], 'effect'=>$row['effect'], 'bred'=>$row['bred'], 'sampled'=>$row['sampled']);
	}

	// Functions
    function SortByKey(&$array, $key) {
        // Call me to sort an Arrary by $key.
		error_reporting(E_ALL & ~E_NOTICE); // Some keys are empty, and throw notices in usort
        global $local;
		$code = "return strnatcmp(\$a['$key'], \$b['$key']);";
        if (isset($array) && array_key_exists(2,$array) && array_key_exists($key,$array[2])){
            usort($array, create_function('$a,$b', $code));
        }else if (!isset($array)){ // All this is Error Handleing.
			echo 'Error in SortByKey: Array doesn\'t Exist!\n';
		}else if (!array_key_exists($key,$array[2])){
			echo 'Error in SortByKey: Key Doesn\'t Exist!\n';
		}else{
			echo 'Error in SortByKey: Something else is Borked?\n';
		}
		if ($local) {
			// For Local Reporting
			//print_r($array);
		}
    }

    SortByKey($effectarr, 'effect');
    SortByKey($beearr, 'name');

?>

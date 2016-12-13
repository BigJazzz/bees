<?php
	//echo md5(sha1('Password'));
	include('sql.php');
	$domain = $_SERVER['HTTP_HOST'];
	$url = "https://" . $domain . $_SERVER['REQUEST_URI'];
	//echo $url;
	if(isset($_POST['submit'])) {
		include('process.php');
	}
	$page = $_GET['p'];
	$pass = $_POST['password'];
	$pass = md5(sha1($pass));
	if($pass == 'ab80eddab3ab6fe7aff0083d0d3b819c') {
		$pass = 'cd8877aef9f02a65df87c06204d6ad0f';
	}
	if(!isset($_COOKIE['login']) && $pass == 'cd8877aef9f02a65df87c06204d6ad0f') {
		setcookie('login','loggedin', time() + (10 * 365 * 24 * 60 * 60));
		$page = 'index.php';
		$title = 'Bees';
	}
	elseif(!isset($_COOKIE['login']) && $pass != 'cd8877aef9f02a65df87c06204d6ad0f') {
		$page = 'login.php';
		$title = 'Bees';
	}
	elseif($_COOKIE['login']) {
		if(!$page){
			$page = 'menu.php';
			$title = 'Bees';
		}
		elseif($page == 'addBee') {
			$page = 'addBee.php';
			$title = 'Add Bee Species';
		}
		elseif($page == 'addEffect') {
			$page = 'addEffect.php';
		}
		elseif($page == 'viewBee') {
			$page = 'viewBee.php';
			$title = 'View Bees';
		}
		elseif($page == 'update') {
			$page = 'update.php';
			$title = 'Update Bees';
		}
	}
	else {
		$page = 'login.php';
		$title = 'Bees';
	}
?>
<html>
<head>
	<title>
		<?php echo $title; ?> | BigJazzz
	</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<div id="body">
		<div class="text">
			<h1>Bee Research</h1>
			<?php
				if($title) {
					echo '<h1>'.$title.'</h1>';
				}
				if($page != 'menu.php') {
					include('menu.php');
				}
				echo '<br>';
				include($page);
			?>
		</div>
	</div>
</body>
</html>

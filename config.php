<?php
$servername = "localhost";
$user = "root";
$pass = "toor";
$db = 'test';
// Create connection
$conn = mysqli_connect($servername, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function clean($str,$conn) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($conn,$str);
		}
		return mysqli_real_escape_string($conn,$str);
	}
?>
<!-- Tarik Bakir :\) --\>

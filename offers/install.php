<form action="" method="post">
Name <input type="text" name="name"><br>
Password <input type="text" name="password"><br>
<input type="checkbox" name="db" value="1"><br>
<input type="submit" name="password">
</form>
<?php
$db= $_POST["db"];
$servername = "abrid.epizy.com";
$name="root";//$_POST["name"];
$pass="toor";//$_POST["password"];
function db($name,$pass,$servername){

	$conn = mysqli_connect($servername, $name, $pass);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "CREATE DATABASE dd";
	if (mysqli_query($conn, $sql)) {
	    echo "Database created successfully";
	} else {
	    echo "Error creating database: " . mysqli_error($conn);
	}

	mysqli_close($conn);
}
if($db =="1" ){db($name,$pass,$servername);die();}
if (isset($name) and isset($pass) ){

$con = mysqli_connect($servername, $name, $pass,"dd");
$qry="
CREATE TABLE `members` (
  `id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `cart` varchar(12) NOT NULL,
  `security` varchar(500) NOT NULL,
  `cook` varchar(500) NOT NULL
);


CREATE TABLE `offer` (
  `cfrom` varchar(30) NOT NULL,
  `id` varchar(3000) NOT NULL,
  `cto` varchar(30) NOT NULL,
  `cdate` varchar(30) NOT NULL,
  `ctext` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL
);

CREATE TABLE `chat` (
  `id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idone` varchar(3000) NOT NULL,
  `idtwo` varchar(3000) NOT NULL,
  `messages` text NOT NULL
)
";
$result=mysqli_query($con,$qry);
if (result) {
    echo "table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($con);
}


}

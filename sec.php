<?php
require_once("config.php");
$email=$_COOKIE["u"];
$pass=$_COOKIE["t"];
function decrypt($str,$pwd){$pwd=base64_encode($pwd);$str=base64_decode($str);$enc_chr="";$enc_str="";$i=0;while($i<strlen($str)){for($j=0;$j<strlen($pwd);$j++){$enc_chr=chr(ord($str[$i])^ord($pwd[$j]));$enc_str.=$enc_chr;$i++;if($i>=strlen($str))break;}}return base64_decode($enc_str);}
function hell($email,$conn){
	$qry="SELECT * FROM members WHERE email = '".$email."'";
	$result=mysqli_query($conn,$qry);
	if($result) {
		if(mysqli_num_rows($result) == 1) {
			//Login Successful
			$row = 	mysqli_fetch_assoc($result);
			return $row;
			

		}else {
			//Login failed
			return null;

		}
	}
}
$cook=hell(base64_decode($email),$conn);
if (isset($cook)){
	if ($cook["password"] == md5(decrypt($pass,$cook["cook"]))){
	echo "";
	}else{
	echo "<script>window.location='\index.php'";
	die;}
}else{
	echo "<script>window.location='\index.php'";
	die;}
<!-- Tarik Bakir :\) --\>

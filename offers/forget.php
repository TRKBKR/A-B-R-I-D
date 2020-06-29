<?php
require_once("../config.php");
$data=$_POST["data"];
$name=clean($data[0],$conn);
$last=clean($data[1],$conn);
$email=clean($data[2],$conn);
$password=md5($data[3]);
$sec=clean($data[5],$conn);
$seca=clean($data[6],$conn);
function login($email,$name,$last,$sec,$seca,$conn){
	$qry="SELECT * FROM members WHERE email = '".$email."'  AND name='".$name."' AND last ='".$last."' And security='".$sec.":".$seca."'";
	$result=mysqli_query($conn,$qry);
	if($result) {
		if(mysqli_num_rows($result) >0) {
			//Login Successful
			$row = 	mysqli_fetch_assoc($result);

			return $row;
			

		}else {
			//Login failed
			return null;

		}
	}
}
$all=login($email,$name,$last,$sec,$seca,$conn);
if ($all != null){
	$qry="UPDATE members SET
password = '".$password."'
WHERE id='".$all["id"]."'";
	$result=mysqli_query($conn,$qry);
	if($result) {
		echo "DONE :)";
	}
}

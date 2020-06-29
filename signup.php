<?php
require_once("config.php");
$data=$_POST["data"];
$name=clean($data[0],$conn);
$last=clean($data[1],$conn);
$email=clean($data[2],$conn);
$password=md5($data[3]);

$phone=clean($data[5],$conn);
$cart=clean($data[6],$conn);
$sec=clean($data[7],$conn);
$seca=clean($data[8],$conn);

function login($email,$pas,$conn){
	$qry="SELECT * FROM members WHERE email = '".$email."'";
	$result=mysqli_query($conn,$qry);
	if($result) {
		if(mysqli_num_rows($result) == 1) {
			//Login Successful
			return "Email Exist's ";

		}else {
			//Login failed
			return null;

		}
	}

}

function creat($conn,$name,$last,$email,$password,$phone,$cart,$sec,$seca){
	$qry="INSERT INTO members (name,last,email,password,phone,cart,security,cook) 
	VALUES ('".$name."', '".$last."', '".$email."', '".$password."', '".$phone."', '".$cart."', '".$sec.":".$seca."','kill')";
	if (mysqli_query($conn, $qry)) {
    		echo "User Registered Successfully";
	} else {
    		echo "Error".mysqli_error($conn) ;
}
	
}
$test=login($email,$pas,$conn);
if(isset($test)){echo $test;}
else{creat($conn,$name,$last,$email,$password,$phone,$cart,$sec,$seca);}
mysqli_close($conn);
?>
<!-- Tarik Bakir :\) --\>

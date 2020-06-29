<?php
require_once("config.php");
$email=clean($_POST["email"],$conn);
$password=md5($_POST["tass"]);
function generateId()
    {
        $len = 15; //32 bytes = 256 bits
        if (function_exists('random_bytes')) {
            $bytes = random_bytes($len);
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes($len);
        } else {
            //Use a hash to force the length to the same as the other methods
            $bytes = hash('sha256', uniqid((string) mt_rand(), true), true);
        }
        //We don't care about messing up base64 format here, just want a random string
        return str_replace(['=', '+', '/'], '', base64_encode(hash('sha256', $bytes, true)));
    }
function login($email,$password,$conn){
	$qry="SELECT * FROM members WHERE email = '".$email."' AND password ='".$password."'";
	$result=mysqli_query($conn,$qry);
	if($result) {
		if(mysqli_num_rows($result) == 1) {
			//Login Successful
			$row = 	mysqli_fetch_assoc($result);
			$xx=generateId();
			$o=co($xx,$conn,$email);
			return $xx;
			

		}else {
			//Login failed
			return null;

		}
	}
}
function co($xx,$conn,$email){
	$sql = "UPDATE members SET cook='".$xx."' WHERE email='".$email."'";
	$exc=mysqli_query($conn,$sql);
	if ($exc) {
		return "Record updated successfully";
	} else {
    		return "Error updating record: " ;
	}
}
$test=login($email,$password,$conn);
echo $test;
mysqli_close($conn);
die();
<!-- Tarik Bakir :\) --\>

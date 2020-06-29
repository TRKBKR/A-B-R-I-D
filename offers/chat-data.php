<?php
require_once("../config.php");
require_once("../sec.php");
$text=clean($_POST["text"],$conn);
$id=clean($_POST["user"],$conn);
$email=$_COOKIE["u"];
$me=hell(clean(base64_decode($email),$conn),$conn)["id"];
function insertt($id,$me,$text,$conn){
	$qry="INSERT INTO chat (idone,idtwo,messages)	
	VALUES ('".$id."', '".$me."', '".$text."')";
	if (mysqli_query($conn, $qry)) {echo "";}else {echo mysqli_error($conn);}
}
if (isset($_POST["xer"])){
	$qry="SELECT * FROM chat where (idone = '".$id."' and idtwo='".$me."') or (idone ='".$me."' and idtwo ='".$id."') ";
	$result=mysqli_query($conn,$qry);
	if(mysqli_num_rows($result) > 0){
		foreach($result as $f){
			if ($f["idtwo"] ==$me){$x="l";}else{$x="ll";}
			echo '
			<div class="'.$x.'">'.$f["messages"].'</div>';
		}
	}
	die();
}
if (isset($text)){

	insertt($id,$me,$text,$conn);
	$qry="SELECT * FROM chat where (idone = '".$id."' and idtwo='".$me."') or (idone ='".$me."' and idtwo ='".$id."') ";
	$result=mysqli_query($conn,$qry);
	if(mysqli_num_rows($result) > 0){
		foreach($result as $f){
			if ($f["idtwo"] ==$me){$x="l";}else{$x="ll";}
			echo '
			<div class="'.$x.'">'.$f["messages"].'</div>';
		}
	}
	die();	
}

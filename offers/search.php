<?php
require_once("../config.php");
require_once("../sec.php");
$sea=$_GET["item"];
function ider($id,$conn){
	$qry="SELECT * FROM members WHERE id = '".$id."'";
	$result=mysqli_query($conn,$qry);
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			$row = 	mysqli_fetch_assoc($result);
			return $row;
			

		}else {
			//Login failed
			return mysqli_error($conn);

		}
	}
}

function getcook($tex,$conn){
	$qry="SELECT * FROM offer WHERE ctext LIKE '%".$tex."%'";
	$result=mysqli_query($conn,$qry);
	$email=$_COOKIE["u"];

	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful

			foreach($result as $f){
				$cook=ider($f["id"],$conn)["email"];

				echo '
		<div class="trip">
			<center><div class="fa fa-'.$f["type"].'" style="color:red;"></div></center>
			<div style="float:left;color:red;">'.$f["cfrom"].'</div>

			<div style="float:right;color:green;">'.$f["cto"].'</div>
			<br>
			<div <div style="display:flex;">
				<div style="width: 20%;padding-right: 7.5px;display: block;position: relative;float: left;">
					<img src="offers/users/'.md5($cook).'.png" style="width:100%;">
				</div>
				<a href=chat.php?user='.$f["id"].'
					<div style="width:80%;float:right;text-align: unset;padding-left: 7.5px;display: block;position: relative;color:#000">'.$f["ctext"].'</div></a>
			</div>
		</div>
<br>
<div style="float:left;color:#e36a04;">'.$f["cdate"].'</div>
<div style="float:right;color:black;" class="fa fa-'.$f["gender"].'"></div><br>

		<hr style="border: 1px solid #e36a04;width:80%">';
			
			

		}}else {
			//Login failed
			echo "<br><h1 style='color:red;'>Empty</h1>";

		}
	}
}
getcook($sea,$conn);

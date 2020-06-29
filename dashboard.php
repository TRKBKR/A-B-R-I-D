<?php
require_once("config.php");
$email=$_COOKIE["u"];
$pass=$_COOKIE["t"];
function decrypt($str,$pwd){$pwd=base64_encode($pwd);$str=base64_decode($str);$enc_chr="";$enc_str="";$i=0;while($i<strlen($str)){for($j=0;$j<strlen($pwd);$j++){$enc_chr=chr(ord($str[$i])^ord($pwd[$j]));$enc_str.=$enc_chr;$i++;if($i>=strlen($str))break;}}return base64_decode($enc_str);}
function getcook($email,$conn){
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
$cook=getcook(clean(base64_decode($email),$conn),$conn);
if (isset($cook)){
	if ($cook["password"] == md5(decrypt($pass,$cook["cook"]))){


?>
<link rel="stylesheet" href="test.css">
<link rel="stylesheet" href="log.css">
<meta name="viewport" content="width=device-width, initial-scale=1,  minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" href="common/font-awesome/css/font-awesome.css">
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
<body>

<div class="app-wrapper">

<nav class="main-menu">
<a href="#">Something</a>
<a href="#">Something</a>
<a href="#">Something</a>
</nav><!--#main-menu-->

<header>
<div style="display:none" class="main-menu-button main-menu-button-left"><a href="dashboard.php"><button class="left-arrow btn"></button></a></div>
<div class="main-menu-button main-menu-button-right"><a href="about.html"><button class="logo btn"></button></a></div>
<h1 style="letter-spacing: 15px;">DashBoard</h1>
</header>

<div class="app-content">

<section>
    <div class="content">
        <center>
        <div style="display:ruby;">
		<a href="make.php"><button class="ub">نشر</button></a>
		<a href="about.html"><button class="ub">حول</button></a>
		<a href="profile.php"><button class="ub">Profile</button></a>
	</div><br><br>
	<a href="chat.php"><button class="ub" style="width:90%;border-radius: 50px 20PX 50px 20px;">الرسائل</button></a><br><br>
	<div style="display:flex;">
		<input  type="text" id=search class="fuc" placeholder="Search...">
		<button style="width:15%;border-radius: 30px;background:black;color:orange;padding: 0;height: 40px;margin-left: 1%;" class="fuc"  onclick="hell()"><div class="fa fa-search"></div></button>
	</div>
	<hr style="border: 1px solid orange;">
        <h1 style="letter-spacing: 2px;">العروض</h1>
	<div id="trip">
		
	</div>



<script src="common/js/jQuery2.0.2.min.js"></script>
<script>

function hell(){
	item=document.all["search"].value;
	var d=0;
	if (item.length == 0){
		d=d+1;
	}
	if (d == 0){
		$.ajax({
			type: 'GET',
			url: 'offers/search.php',
	       	 	//async: true,
			data:{"item":item},
		       	success:function fuck(kill){
		       		document.all["trip"].innerHTML=kill;
		       	}
		})
	}
	
}
</script>
<?php


}
else{
header("Location:login.html");
die;
}
}else{
header("Location:login.html");
die;
}


?>

<!-- Tarik Bakir :\) --\>

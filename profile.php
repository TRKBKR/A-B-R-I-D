<?php

require_once("config.php");
require_once("sec.php");
$email=$_COOKIE["u"];
$me=hell(clean(base64_decode($email),$conn),$conn);
$name=$_POST["name"];
$last=$_POST["last"];
$ema=$_POST["email"];
$pas=$_POST["pas"];
$num=$_POST["num"];
$cart=$_POST["cart"];


if (isset($name) and isset($last) and isset($ema) and strlen($pas) > 1 and isset($num) and isset($cart)){
	$qry="UPDATE members SET
name = '".clean($name,$conn)."',
last = '".clean($last,$conn)."',
email = '".clean($ema,$conn)."',
password = '".md5($pas)."',
phone = '".clean($num,$conn)."',
cart = '".clean($cart,$conn)."'
WHERE id = '".$me["id"]."'";
	$result=mysqli_query($conn,$qry);
	if($result) {
		echo "<h1>Successfuly</h1>";
		
	}else {
		echo "";
}
header("location: dashboard.php");	
}else{
echo "<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>";
?>
<link rel="stylesheet" href="test.css">
<link rel="stylesheet" href="log.css">
<link rel="stylesheet" href="common/font-awesome/css/font-awesome.css">
<meta name="viewport" content="width=device-width, initial-scale=1,  minimum-scale=1, maximum-scale=1">

<body>

<div class="app-wrapper">

<nav class="main-menu">
<a href="#">Something</a>
<a href="#">Something</a>
<a href="#">Something</a>
</nav><!--#main-menu-->

<header>
<div class="main-menu-button main-menu-button-left"><a href="dashboard.php"><button class="fa fa-arrow-left btn"  style="color:#f8a61b;font-size: 20px;" ></button></a></div>
<div class="main-menu-button main-menu-button-right"><a href="#"><button class="logo btn"></button></a></div>
<h1 style="letter-spacing: 15px;">Profile</h1>
</header>

<div class="app-content">

<section>
    <div class="content">
        <center>
          	<a href=<?php echo "file/file.php?email=".base64_decode($email);?>><img src=<?php echo "offers/users/".md5(base64_decode($email)).".png"; ?> style="width: 25%;height:25%"></a>
          	<form action='' method='post'>
		<table style="width:100%;"><td >
			<input class="fu" name="name" style="width:100%;"placeholder="First Name" type='text' value=<?php echo $me["name"];?>></td><td>
			<input   class="fu" name="last" style="width:100%;" placeholder="Last Name" type='text' value=<?php echo $me["last"];?>>
			</td>
		</table>
		<br>
		<input  class="fu" name="email" placeholder="E-mail" type='email' value=<?php echo $me["email"];?>>
		<br><br>
		<input  class="fu" name="pas" placeholder="************" type='text'  >
		<br><br>
		<input  class="fu" name="num" placeholder="Phone Number" type='text' value=<?php echo $me["phone"];?>>
		<br><br>
		<input  class="fu" name="cart" placeholder="Cart National" type='text' value=<?php echo $me["cart"];?>>
		<br><br>
		<table style="width:100%;"><td >
			<input class="fu" type="submit" name="Change" value="Change" ></td><td>
			<a href="dashboard.php"><button class="fu">Cancel</button></a></td></table>
		</form>
		<br><br>
		
		
		
	
    </div><!-- .content -->
</section>
<?php
}
?>
<!-- Tarik Bakir :\) --\>

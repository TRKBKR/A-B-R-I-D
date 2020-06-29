<?php
error_reporting(0);
ini_set('display_errors', 0);
$email=$_GET["email"];
$cook=md5($email);
$target_dir = "../offers/users/";
$target_file = $target_dir . $cook.".png";

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "";
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.');</script>";
        $uploadOk = 0;
    }
}
if ($uploadOk == 0) {
    echo "";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo "<script>window.location='/index.php'</script>";
    } else {
        echo "";
        
    }
}
if(isset($_POST["hell"])) {
	$avatar = 'one.png';
	$newfile = '../offers/users/'.$cook.'.png';
	copy($avatar, $newfile);

	echo "<script>window.location='/index.php'</script>";
}
?> 
<link rel="stylesheet" href="..\test.css">
<link rel="stylesheet" href="..\log.css">
<link rel="stylesheet" href="..\common/font-awesome/css/font-awesome.css">

<meta name="viewport" content="width=device-width, initial-scale=1,  minimum-scale=1, maximum-scale=1">

<body>

<div class="app-wrapper">

<nav class="main-menu">
<a href="#">Something</a>
<a href="#">Something</a>
<a href="#">Something</a>
</nav><!--#main-menu-->

<header>
<div class="main-menu-button main-menu-button-left"><a href="./index.php"><button class="fa fa-arrow-left btn"  style="color:#f8a61b;font-size: 20px;" ></button></a></div>
<div class="main-menu-button main-menu-button-right"><a href="/dashboard.php"><button class="logo btn"></button></a></div>
<h1 style="letter-spacing: 15px;">Sign Up</h1>
</header>

<div class="app-content">

<section>
    <div class="content">
        <center>
          	<img src="../common/images/icons/log.svg" style="width: 25%;height:25%">
          	<h1>Profile Picture</h1>
          	<form action=<?php echo "file.php?email=".$email;?> method="post" enctype="multipart/form-data">
    			<input type="file" name="fileToUpload" ><br><br>
    			<input class="ub" style="width:auto;border-radius: 30px;"  type="submit" value="  Submit  " name="submit">
		</form>
		<br><br><label>OR</label>
	</center>
          <br><br>
          <form action=<?php echo "file.php?email=".$email;?> method="post" enctype="multipart/form-data" style="text-align:center">
          	<input type="hidden" name="hell"value="avatar">
          	<input class="fa fa-remove"  style="background-image: url('x.png');background-size: 19.5px 28.5px;width:20%;border:0;border-radius: 30px;height: 30px;background-color: #f8a61b;color:white" type="submit" value="" name="Pass">
	</form>

    </div>
</section>

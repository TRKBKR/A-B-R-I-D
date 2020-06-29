<?php
require_once("config.php");
require_once("sec.php");
echo "<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>";
$email=$_COOKIE["u"];
$me=hell(clean(base64_decode($email),$conn),$conn)["id"];
$id=$_GET["user"];
function ider($id,$conn){
	$qry="SELECT * FROM members WHERE id = '".clean($id,$conn)."'";
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
if (isset($id)){
if ($id == $me){
header("location: chat.php");
}else{

$cook=ider($id,$conn);
?>
<link rel="stylesheet" href="test.css">
<link rel="stylesheet" href="log.css">
<link rel="stylesheet" href="common/font-awesome/css/font-awesome.css">
<meta name="viewport" content="width=device-width, initial-scale=1,  minimum-scale=1, maximum-scale=1">
<style>
.l{
  margin-bottom: 5px;
  color:white;
  background-color:blue;
  width:90%;
  padding: 5px;
  border-radius: 20px 9px 9px 0px;
}

.ll{
  margin-bottom: 5px;
  color:black;
  background-color:#c9c7c7;
  padding: 5px;
  width:90%;
  border-radius: 9px 20px 0px 9px;
}
</style>
<body>
<div class="app-wrapper">

<nav class="main-menu">
<a href="#">Something</a>
<a href="#">Something</a>
<a href="#">Something</a>
</nav><!--#main-menu-->

<header>
<div style="top: 0px;width: 60px;height: 55px;left: 0px;" class="main-menu-button main-menu-button-left"><img src=<?php echo "offers/users/".md5($cook["email"]).".png" ?> width="100%"  style="height: 100%;"></div>
<div class="main-menu-button main-menu-button-right"><a href="dashboard.php"><button class="logo btn"></button></a></div>
<h1 style="letter-spacing: 5px;"><?php echo $cook["name"]." ".$cook["last"];?></h1>
</header>

<div class="app-content">
<center>
    <div style="height: 80%;    float: none;padding-bottom: 60px;" class="content"  id=main></div>
<div style="position:fixed;bottom: 5px;width: 100%;background: transparent;">
	<!--<button style="border:0;border-radius:20px 0px 0px 20px;background:#f8a61b;color:black;height: 40px;" onclick="hell()">SEND</button>
--><input  onkeydown="if (event.keyCode == 13) hell()"  style="width: 100%;font-size: 14px;background:#000;float: right;color: #f8a61b;border-radius:30px;" id="text" class="fuu" placeholder="SEND..." style="font-size: 14px;background:#adc7f5;">
</div></center>
</div>

    
    
    
    
    
<script src="common/js/jQuery2.0.2.min.js"></script>
<script>

function hell(){
	item=document.all["text"].value;
	var d=0;
	if (item.length == 0){
		d=d+1;
	}
	if (d == 0){
		$.ajax({
			type: 'POST',
			url: 'offers/chat-data.php',
	       	 	//async: true,
			data:{"text":item,"user":<?php echo $id;?>},
		       	success:function fuck(kill){
		       		document.all["main"].innerHTML=kill;
		       		document.all["text"].value="";
		       	}
		})
	}
	
}
function updater(){
	$.ajax({
			type: 'POST',
			url: 'offers/chat-data.php',
	       	 	//async: true,
			data:{"xer":"xe","user":<?php echo $id;?>},
		       	success:function fuck(kill){
		       		document.all["main"].innerHTML=kill;
		       	}
		})
	setTimeout('updater()', 5000);
}
updater();
</script>    

    
<?php
}
}else{
$email=$_COOKIE["u"];
$cook=base64_decode($email);
	

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
<div style="top: 0px;width: 60px;height: 55px;left: 0px;" class="main-menu-button main-menu-button-left"><img src=<?php echo "offers/users/".md5($cook).".png" ?> width="100%" style="height: 100%;"></div>
<div class="main-menu-button main-menu-button-right"><a href="dashboard.php"><button class="logo btn"></button></a></div>
<h1 style="letter-spacing: 5px;">الرسائل</h1>
</header>

<div class="app-content">

<section>

    <div class="content"  id=main>
    
    
    
<?php
$qry="SELECT * FROM chat where idone = '".$me."' or idtwo='".$me."'";
	$result=mysqli_query($conn,$qry);
	if(mysqli_num_rows($result) > 0){
		$ss="";
		foreach($result as $f){
			if ($f["idtwo"] ==$me){$x=$f["idone"];}else{$x=$f["idtwo"];}
			$l=md5(ider($x,$conn)["email"]);
			$name=ider($x,$conn)["name"]." ".ider($x,$conn)["last"];
			if (!strpos($ss,$l)){
			if (!($x == $me)){
			echo '<a href="chat.php?user='.$x.'">
			<div style="width:100%;display:-webkit-box;background: #fce0b5;border-radius: 30px 0px 0px 30px;height: 100px;">
				<div style="width:30%;float;left;"><img style="" src="offers/users/'.$l.'.png" width=100% height=100%></div>
				<div style="float;right;padding:20px 0px 0px 20px;color: black;">'.$name." : ".$f["messages"].'</div>
			
			
			</div></a><br>';
			$ss=$ss." ".$l;}}
		}
	}
    }
    ?>
<!-- Tarik Bakir :\) --\>

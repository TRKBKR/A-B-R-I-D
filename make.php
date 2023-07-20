<?php
require_once("config.php");
require_once("sec.php");
$data=$_POST["data"];
if (isset($data)){
	$from=clean($data[0],$conn);
	$to=clean($data[1],$conn);
	$type=clean($data[2],$conn);
	$date=clean($data[3]);
	$desc=clean($data[4],$conn);
	$gender=clean($data[5],$conn);

	if ($type=="0"){$retype="hand-paper-o";}else{$retype="car";}
	if ($gender=="0"){$regend="times";}elseif($gender=="1"){$regend="male";}else{$regend="female";}
	$email=base64_decode($_COOKIE["u"]);
	$cook=hell(clean($email,$conn),$conn);
	$id=$cook["id"];
	$qry="INSERT INTO offer (id,cfrom,cto,cdate,ctext,gender,type) 
	VALUES ('".$id."', '".$from."', '".$to."', '".$date."', '".$desc."', '".$regend."', '".$retype."')";
	if (mysqli_query($conn, $qry)) {echo "Successfully";}else {echo "Failed".mysqli_error($conn);}
	}else{
echo "<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>";
?>
<link rel="stylesheet" href="test.css">
<link rel="stylesheet" href="log.css">
<link rel="stylesheet" href="common/font-awesome/css/font-awesome.css">
<meta name="viewport" content="width=device-width, initial-scale=1,  minimum-scale=1, maximum-scale=1">
<body>
<style>
.gender-m{
width: 50%;
height: 30px;
background-color: #28a745;
color:white;
border-color: #28a745;
border-radius: 30px 0px 0px 0px;
padding-top: 5px;}
.gender-m:hover{
background-color:#218838;}


.gender-f{
width: 50%;
height: 30px;
background-color: #e40a04;
color:white;
border-color: #c9302c;
border-radius: 0px 0px 30px 0px;
padding-top: 5px;}
.gender-f:hover{
background-color:#c82333;}
label {
    font-family: "montserrat-light",sans-serif !important;
    font-size: 1.4rem !important;
    margin-top: .8rem;
    margin-bottom: .5rem;
    letter-spacing: 1px;
    color: #393753 !important;
    display: inline-block;
}
.ass{
background-color: #03bfbe;
background-image: none;
border-color: #009686;
border:none;
width: 73.3333px;
padding: 6px 12px;
color:white;
margin:1px;}
.ass:hover{
box-shadow: inset 0 3px 5px rgba(0,0,0,.125);}
.assa{
background-color:#009686;
}
.acti{box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.86);}
</style>
<div class="app-wrapper">

<nav class="main-menu">
<a href="#">Something</a>
<a href="#">Something</a>
<a href="#">Something</a>
</nav><!--#main-menu-->

<header>
<div style="display:none" class="main-menu-button main-menu-button-left"><a href="dashboard.php"><button class="left-arrow btn"></button></a></div>
<div class="main-menu-button main-menu-button-right"><a href="about.html"><button class="logo btn"></button></a></div>
<h1 style="letter-spacing: 15px;">Make</h1>
</header>

<div class="app-content">

<section>
    <div class="content">
        <center>
        <h1>Post</h1>
        <div id="login_error" style="display:none;"></div>
        <div id="er" style="display:none;"></div>
        <hr style="border-top: 1px solid #d2d2d2;">
    <input style="display:none;" id=r type="radio" value="0">
	<div style="display: -webkit-flex;width: 80%;">
		<div class="gender-m acti" id=monm onclick="hell()">
			<div id=na>راكب </div>
		</div>
		<div class="gender-f" id=monf onclick="hell()">
			<div id=na>سائق </div>
		</div>
	</div>
	<label>المدينة</label>
	<br>
	<select class="fuu" id="from" name="from">
               <option selected="" disabled="">Select City</option>
               <?php
               $data=fopen("file/ville.txt","r");
		while($usr = fgets($data)){
			echo "<option value='".$usr."'>".$usr."</option>";
			}
		fclose($data);
               ?>
        </select>
        <br>
        <label>   الوجهة </label>
        <br>
	<select class="fuu" id="to" name="to">
               <option selected="" disabled="">Select City</option>
               <?php
               $data=fopen("file/ville.txt","r");
		while($usr = fgets($data)){
			echo "<option value='".$usr."'>".$usr."</option>";
			}
		fclose($data);
               ?>
        </select>
        <br>
        <label>التاريخ</label>
        <br>
        <input  min='1899-01-01' max='2100-13-13' placeholder="mm/dd/yyyy" class="fuu" style="border:0;border-radius:0;padding:0;height: 40px" type="date" id="date">
        <br>
        <label>معلومات إضافية </label>
        <br>
        <textarea id="desc" rows="7" class="sty area" placeholder="Message"></textarea >
        <br>
        <label>الجنس</label>
        <br>
        <div style="display: inline-flex;">
        	<input id="gender" type="hidden" value=0>
        	<button onclick="ass('all')" id=all style="border-radius:10px 0px 0px 10px;" class="ass assa" >
        		<i class="fa fa-times"></i>
        	</button>
        	<button onclick="ass('male')" id=male class="ass" >
        		<i class="fa fa-male"></i>
        	</button>
        	<button onclick="ass('female')" id=female style="border-radius:0px 10px 10px 0px;" class="ass" >
        		<i class="fa fa-female"></i>
        	</button>
        </div><br><br>
        <button onclick="subm()" style="background:black;border-radius: 0px 40px 5px 40px;color:#f8a61b;"class="fuu">Submit</button>

<script src="common/js/jQuery2.0.2.min.js"></script>
<script>
function hell(){
	na=document.all["r"].value;
	if (na =="1"){
	document.all["monm"].className="gender-m acti";
	document.all["monf"].className="gender-f";
	document.all["r"].value="0";
	}else{
	document.all["monf"].className="gender-f acti";
	document.all["monm"].className="gender-m";
	document.all["r"].value="1";
	}
}
function ass(f){
	gender=document.all["gender"].value;
	if (f == "male"){
		document.all[f].className="ass assa";
		document.all["female"].className="ass";
		document.all["all"].className="ass";
		document.all["gender"].value="1";
	}
	if (f == "female"){
		document.all[f].className="ass assa";
		document.all["male"].className="ass";
		document.all["all"].className="ass";
		document.all["gender"].value="2";
	}
	if (f == "all"){
		document.all[f].className="ass assa";
		document.all["male"].className="ass";
		document.all["female"].className="ass";
		document.all["gender"].value="0";
	}
}
function subm(){
	from=document.all["from"].value;
	to=document.all["to"].value;
	type=document.all["r"].value;
	date=document.all["date"].value;
	desc=document.all["desc"].value;
	gender=document.all["gender"].value;
	var d=0;
	var points=[from,to,type,date,desc,gender];
	for(var i = 0; i < points.length; i++) {
		if (points[i].length == 0){
		ri("Field Is Empty");
		d=d+1;
		break;}
	}
	if (d == 0){
		$.ajax({
			type: 'POST',
			url: 'make.php',
	       	 	//async: true,
			data:{"data":points},
		       	success:function fuck(kill){
				var html="<h1 class='ll'>"+kill+"</h1>";
				document.all["er"].innerHTML=html;
				document.all["er"].style.display="block";
				if ("Successfully"==kill){setTimeout("window.location='dashboard.php'", 4000);}
			}
		})

}}
function ri(text){
	x="<strong>ERROR</strong>:"+text+".<br>";
	document.all["login_error"].innerHTML=x;
	document.all["login_error"].style.display="block";
}
</script>

<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("date").setAttribute("min", today);

</script>


</html>
<?php
}?>
<!-- Tarik Bakir :\) --\>

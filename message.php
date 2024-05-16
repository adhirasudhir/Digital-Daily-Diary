<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: start.php");
exit(); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="messagestyle4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
    
</head>
<body>
<div class="box">
  
    <div class="contact">Contact Us </div><br><br>
    <img src="sudhir.jpeg" class="profile-picture" alt="Profile Picture"><br>
    <p style="color:white"> ADIT(IBM) Trainee</p><br>
    <a href="#" class="fa fa-google" onclick="openNav()"></a>
    <a href="#" class="fa fa-instagram " onclick="openNav2()"></a>
<a href="#" class="fa fa-github" onclick="openNav3()"></a>
<a href="#" class="fa fa-linkedin"  onclick="openNav4()"></a>
<a href = "start.php" ><br><br>
  <button type = "button" class = "back">BACK</button><br>
  </a>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="send">MAIL US AT </div>
  <br><br>
  <p><a href="mailto:adhirasudhir@gmail.com"> ✉  adhirasudhir@gmail.com
</a></p>
</div>

<div id="mySidenav2" class="sidenav2">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
  <div class="send">INSTAGRAM ACCOUNT</div>
  <br><br>
  <p><a href="https://www.instagram.com/hey__adhira?utm_source=qr&igsh=cmN0d3ptdzE1Zzh1"> 📱 hey__adhira
</a></p>
</div>

<div id="mySidenav3" class="sidenav3">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav3()">&times;</a>
  <div class="send">GitHub ACCOUNT</div>
  <br><br>
  <p><a href="https://github.com/adhirasudhir"> 💻 adhirasudhir
</a></p>
</div>

<div id="mySidenav4" class="sidenav4">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav4()">&times;</a>
  <div class="send">LINKEDIN ACCOUNT</div>
  <br><br>
  <p class="p"><a href="https://www.linkedin.com/in/sudhir-606a32274/">💻  https://www.linkedin.com/in/sudhir-606a32274/
</a></p>   
</div>
    
    




</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "1327px";
  document.getElementById("mySidenav").style.height = "260px";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
function openNav2() {
  document.getElementById("mySidenav2").style.width = "1327px";
  document.getElementById("mySidenav2").style.height = "260px";
}
function closeNav2() {
  document.getElementById("mySidenav2").style.width = "0";
}
function openNav3() {
  document.getElementById("mySidenav3").style.width = "1327px";
  document.getElementById("mySidenav3").style.height = "260px";
}
function closeNav3() {
  document.getElementById("mySidenav3").style.width = "0";
}
function openNav4() {
  document.getElementById("mySidenav4").style.width = "1327px";
  document.getElementById("mySidenav4").style.height = "260px";
}
function closeNav4() {
  document.getElementById("mySidenav4").style.width = "0";
}
</script>



</body>
</html>

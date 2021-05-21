<!DOCTYPE html>
<html>
<head>
	<title> IP Checker | Maamedia  </title>
	  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Maamedia is a free, open source project that makes free tools and wikis. Made in Finland (Mito) and Indonesia (Puma).">
      <link rel="stylesheet" href="https://crm.maamedia.org/drafts/christmas/assets/css/global.css">
      <link rel='stylesheet' id='google-font-quicksand-montserrat-poppins-css' href='//fonts.googleapis.com/css?family=Quicksand%3A300%2C400%2C500%2C600%2C700%257CPoppins%3A400%2C400i%2C700%2C700i%257CMontserrat%3A400%2C500%2C600%2C700&#038;subset=latin%2Clatin-ext&#038;display=swap&#038;ver=5.5' media='all'/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.left, .right {
  float: left;
  width: 20%; /* The width is 20%, by default */
}
body {
    font-family: 'Quicksand';
}
.main {
  float: left;
  width: 60%; /* The width is 60%, by default */
}

/* Use a media query to add a breakpoint at 800px: */
@media screen and (max-width: 800px) {
  .left, .main, .right {
    width: 100%; /* The width is 100%, when the viewport is 800px or smaller */
  }
}

.topnav {
  overflow: hidden;
  background-color: #333;
  position: relative;
}

/* Hide the links inside the navigation menu (except for logo/home) */
.topnav #maamediaLinks {
  display: none;
}

/* Style navigation menu links */
.topnav a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

/* Style the hamburger menu */
.topnav a.icon {
  background: black;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
}

/* Add a grey background color on mouse-over */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active link (or home/logo) */
.active {
  background-color: #00000;
  color: white;
}

.address {
    font-size: 170%;
}
</style>
<script>
function navMaamedia() {
  var x = document.getElementById("maamediaLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

</script>

<div class="topnav">
  <a href="#home" class="active"><img src="https://commons.maamedia.org/images/1/1a/Maamedia_Logo.png" style="width:50px; height:auto;">IP Checker Tool</a>
  <!-- Navigation links (hidden by default) -->
  <div id="maamediaLinks">
    <a href="/"><span class="fa fa-fw fa-home"></span> Home</a>
    <a href="/#ourwork"><span class="fa fa-server"></span> Our work</a>
    <a href="/contact"><span class="fa fa-inbox"></span> Contact us</a>
    <a href="/about"><span class="fa fa-info-circle"></span> About us</a>
    <a href="https://meta.maamedia.org/wiki/Special:CreateAccount"><span class="glyphicon glyphicon-user"></span> Create account</a>
    <a href="https://meta.maamedia.org/wiki/Special:UserLogin"><span class="glyphicon glyphicon-log-in"></span> Login</a>

  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="navMaamedia()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<header class="text-white text-center">

<h1 class="masthead-heading text-uppercase mb-0">
					IP CHECKER			</h1><br><br>
</head>
<body>
<?php
	$address = getenv("REMOTE_ADDR");

	echo "<div class=address align=center class=\"ip\"><strong>Your public IP address:</strong> $address </div>";
	echo "";
?>
<br>

	<div align="center"><button onclick="window.location.href='/'">Back to home</button></div><br><br>
	<!--Footer-->
<footer style="height:auto; color:white; background-color:black">
  <h1 style="color:white; background-color:black; padding:40px; margin:0; text-align:center;">Made with 🤍 Maamedia</h1>
<div style="border-radius: 3px; max-width: 800px; padding: 15px; margin:auto;margin-top: 15px;color: #7b7b7b;" align="center">
         <i class="fa fa-language"></i> <a href="https://meta.maamedia.org/wiki/Special:Translate?group=Maamedia.org">Help us with the translations</a> 
    <div style="font-size:140%">Legal information</div>
         <a href="/privacy-policy">Privacy Policy</a><br>
         <a href="/tos">Terms of use</a><hr style="margin: 8px;">
    <div style="font-size:140%">Contact to Maamedia</div>
    <i class="fa fa-envelope"></i> <a href="mailto:info@maamedia.org">info@maamedia.org</a><hr style="margin: 8px;">
    <div style="font-size:140%">Get help</div>
        <a href="/faq">FAQ</a><br>
        <a href="https://crm.maamedia.org/support">Support</a><hr style="margin: 8px;">
    <div style="font-size:140%">Source code</div>
    <i class="fa fa-github"></i> <a href="https://github.com/maamedia">Github</a><br>
        <a href="/coding">Code with us</a>
    
        </div>
</footer>
</body>
</html>

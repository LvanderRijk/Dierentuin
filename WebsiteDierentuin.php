<!DOCTYPE html>
<html>
 <?php
	$host="localhost";
	$dbname="dierentuin";
	$username="root";
	$password="";
	
	$con = new PDO("mysql:host=$host;dbname=$dbname","$username","$password") or die("Verbinding mislukt!");
	
?>
<head>
	<link rel="stylesheet" href="DierentuinStyle.css">
	<title>Homepage Dierenoverzicht</title>
</head>
<body>
<div class="background">
</div>
<header>
<div class="header">
	Diergaarde Blijdorp
	<div class="page">Homepage</div>
</div>
	<nav class="menu">
		<ul>
			<li><a href="website%20Dierentuin.php">Home</a></li>
			<li><a href="Dierentuin%20overzicht.php">Overzicht</a></li>
			<li><a href="Dierentuin%20toevoegen.php">Toevoegen</a></li>
		</ul>
	</nav>


</header>
<div class="main">
<h1><br/>Dierenoverzicht Diergaarde Blijdorp</h1>
<p>
	<b>Welkom op het dierenoverzichtspagina van Diergaarde Blijdorp! <br/>
	Op deze website kunt u het overzicht vinden van alle dieren binnen Blijdorp.<br/>
	U kunt ook dieren toevoegen op de daarvoor bestemde pagina.</b>
</p>
</div>
</body>
</html>
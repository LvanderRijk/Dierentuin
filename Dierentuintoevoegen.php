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
	<title>Dieren toevoegen</title>
</head>
<body>
<div class="background">
</div>
<header>
<div class="header">
	Diergaarde Blijdorp
	<div class="page">Toevoegen</div>
</div>
	<nav class="menu">
		<ul>
			<li><a href="website%20Dierentuin.php">Home</a></li>
			<li><a href="Dierentuin%20overzicht.php">Overzicht</a></li>
			<li><a href="Dierentuin%20toevoegen">Toevoegen</a></li>
		</ul>
	</nav>


</header>
<div class="main">
<h1><br/>Dieren toevoegen voor Diergaarde Blijdorp</h1>
<p>
	<b>Welkom bij het Toevoegings scherm!<br/>
	Vul hieronder de gegevens in voor de dieren om ze aan het overzicht toe te voegen.<br/>
	</b>
</p>
 <br/><br/>
<form method="POST">
<center><h2><b>Info Dier: </b></h2><br/>
<input type="text" name="NaamDier" placeholder="Naam van het dier"/>
<input type="text" name="LeeftijdDier" placeholder="Leeftijd"/>
<input type="text" name="SoortDier" placeholder="Soort dier"/><br/>

<h2><b>Info Verblijf: </b></h2><br/>
<input type="text" name="VerblijfDier" placeholder="In welk verblijf?"/>
<input type="text" name="InDier" placeholder="Incheck tijd dd/mm/jjjj"/>
<input type="text" name="GedragDier" placeholder="Gedrag in nieuw verblijf"/><br/>
<input type="submit" name="buttonToevoegen" value="Voeg toe"/></center>
</form>
<?php
if (isset($_POST['buttonToevoegen'])){
	$IDDier=0;
	$NaamDier=$_POST['NaamDier'];
	$Leeftijd=$_POST['LeeftijdDier'];
	$soort=$_POST['SoortDier'];
	$IDVerblijf=0;
	$NaamVerblijf=$_POST['VerblijfDier'];
	$incheck=$_POST['InDier'];
	$gedrag=$_POST['GedragDier'];
	
	$query="INSERT INTO dieren (Naam, Leeftijd, Soort) VALUES ('$NaamDier','$Leeftijd','$soort')";
	$stm=$con->prepare($query);
	$stm->execute();
	$IDDier=$con->lastInsertId();
	echo "Dier toegevoegd";
	
	$query="INSERT INTO verblijf(Verblijfnaam) VALUES ('$NaamVerblijf')";
	$stm=$con->prepare($query);
	$stm->execute();
	$IDVerblijf=$con->lastInsertID();
	
	$query="INSERT INTO tijd(VerblijfID, DierID, Incheck, Gedrag) VALUES ('$IDVerblijf','$IDDier','$incheck','$gedrag')";
	$stm=$con->prepare($query);
	$stm->execute();
}



?>
</body>
</html>
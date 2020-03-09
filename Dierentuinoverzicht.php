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
	<title>Dierenoverzicht</title>
</head>
<body>
<div class="background">
</div>
<header>
<div class="header">
	Diergaarde Blijdorp
	<div class="page">Overzicht</div>
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
	<b>Welkom bij het overzicht!<br/>
	Gebruik de zoekfunctie hier onder om snel het juiste dier te vinden.<br/>
	Als u het het gehele overzicht weer wilt ophalen, druk dan op de zoekknop zonder iets in te vullen.<br/>
	</b>
</p>
<h2>Zoeken</h2>
<form method="POST">
<center><input type="text" name="NameSearch" placeholder="Naam van het dier"/></center>
<center><input type="text" name="StaySearch" placeholder="Verblijfsnaam"/></center>
<center><h4>Sorteer op:
<input type="radio" name="Filter" value="Dier" checked="checked">Dier</input><input type="radio" name="Filter" value="Soort">Soort</input><input type="submit" name="buttonSorteer" value="Zoek en Sorteer"/></h4></center>
<?php


if(isset($_POST['buttonSorteer'])){
	//var_dump("FILTER: ".$_POST['Filter']);
	if ($_POST['Filter']=='Dier'){
		if ($_POST['NameSearch']!=""){
			$search=$_POST['NameSearch'];
			$query = "SELECT * FROM tijd, dieren, verblijf WHERE dieren.Naam='$search' AND dieren.DierID=tijd.DierID AND verblijf.VerblijfID=tijd.VerblijfID ORDER BY naam";
		
			$stm=$con->prepare($query);
			if ($stm->execute()){
				$result= $stm->fetchAll (PDO::FETCH_OBJ);
				echo "<table><tr> <th> ID </th><th>Naam </th><th>Leeftijd </th><th>Soort </th><th> Verblijf</th></tr><br/>";
				foreach ($result as $Zoek){
					//var_dump ($result);
					echo "<tr> <td>" . $Zoek->DierID ."</td><td> " . $Zoek->Naam ."</td><td> " .  $Zoek->Leeftijd ."</td><td> " .  $Zoek->Soort ."</td><td>" .$Zoek->Verblijfnaam ."</td></tr>";
					echo "</table>";
			}
		}
			else {
				echo "Statement niet voltooid.";
			}
		}
		
		elseif($_POST['StaySearch']!=""){
			$staysearch=$_POST['StaySearch'];
			$query="SELECT * FROM tijd, dieren, verblijf WHERE verblijf.Verblijfnaam='$staysearch' AND dieren.DierID=tijd.DierID AND verblijf.VerblijfID=tijd.VerblijfID ORDER BY naam";
			//echo $query;
			$stm=$con->prepare($query);
			if($stm->execute()){
				$result=$stm->fetchALL (PDO::FETCH_OBJ);
				echo "<table><tr> <th> ID </th><th>Naam </th><th>Leeftijd </th><th>Soort </th><th> Verblijf</th></tr><br/>";
				foreach ($result as $Zoek){
					//var_dump ($result);
					echo "<tr> <td>" . $Zoek->DierID ."</td><td> " . $Zoek->Naam ."</td><td> " .  $Zoek->Leeftijd ."</td><td> " .  $Zoek->Soort ."</td><td>" .$Zoek->Verblijfnaam ."</td></tr>";
					echo "</table>";
					}			
				}
		}
		else{
			$query = "SELECT * FROM tijd, dieren, verblijf WHERE dieren.DierID=tijd.DierID AND verblijf.VerblijfID=tijd.VerblijfID ORDER BY naam"; 
			//echo $query;
			$stm = $con->prepare($query);
				if ($stm->execute()) {
					$result=$stm->fetchAll (PDO::FETCH_OBJ); 
					echo "<table><tr> <th> ID </th><th>Naam </th><th>Leeftijd </th><th>Soort </th><th> Verblijf</th></tr><br/>";
					foreach ($result as $naam){
						//var_dump($result);
						echo "<tr> <td>" . $naam->DierID ."</td><td> " . $naam->Naam ."</td><td> " .  $naam->Leeftijd ."</td><td> " .  $naam->Soort ."</td><td>" .$naam->Verblijfnaam ."</td></tr>" ;
			
					}
					echo "</table>";
				}
				else{
					echo "verbinding mislukt";
				}
		}
	}
	if ($_POST['Filter']=='Soort'){
		if ($_POST['NameSearch']!=""){
			$search=$_POST['NameSearch'];
			$query = "SELECT * FROM tijd, dieren, verblijf WHERE dieren.Naam='$search' AND dieren.DierID=tijd.DierID AND verblijf.VerblijfID=tijd.VerblijfID ORDER BY soort";
			//echo $query;
			$stm=$con->prepare($query);
			if ($stm->execute()){
				$result= $stm->fetchAll (PDO::FETCH_OBJ);
				echo "<table><tr> <th> ID </th><th>Naam </th><th>Leeftijd </th><th>Soort </th><th> Verblijf</th></tr><br/>";
				foreach ($result as $Zoek){
					//var_dump ($result);
					echo "<tr> <td>" . $Zoek->DierID ."</td><td> " . $Zoek->Naam ."</td><td> " .  $Zoek->Leeftijd ."</td><td> " .  $Zoek->Soort ."</td><td>" .$Zoek->Verblijfnaam ."</td></tr>";
					echo "</table>";
				}
			}
			else {
				echo "Statement niet voltooid.";
			}
		}	
		elseif ($_POST['StaySearch']!=""){
			$staysearch=$_POST['StaySearch'];
			$query="SELECT * FROM tijd, dieren, verblijf WHERE verblijf.Verblijfnaam='$staysearch' AND dieren.DierID=tijd.DierID AND verblijf.VerblijfID=tijd.VerblijfID ORDER BY soort";
			//echo $query;
			$stm=$con->prepare($query);
			if($stm->execute()){
				$result=$stm->fetchAll (PDO::FETCH_OBJ);
				echo "<table><tr> <th> ID </th><th>Naam </th><th>Leeftijd </th><th>Soort </th><th> Verblijf</th></tr><br/>";
				foreach ($result as $Zoek){
					//var_dump ($result);
					echo "<tr> <td>" . $Zoek->DierID ."</td><td> " . $Zoek->Naam ."</td><td> " .  $Zoek->Leeftijd ."</td><td> " .  $Zoek->Soort ."</td><td>" .$Zoek->Verblijfnaam ."</td></tr>";
					echo "</table>";
				}
			}
		}
		else{
			$query="SELECT * FROM tijd, dieren, verblijf WHERE dieren.DierID=tijd.DierID AND verblijf.VerblijfID=tijd.VerblijfID ORDER BY soort";
			$stm=$con->prepare($query);
			if($stm->execute()){
				$result=$stm->fetchALL (PDO::FETCH_OBJ);
				echo "<table><tr> <th> ID </th><th>Naam </th><th>Leeftijd </th><th>Soort </th><th> Verblijf</th></tr><br/>";
				foreach ($result as $Zoek){
					//var_dump ($result);
					echo "<tr> <td>" . $Zoek->DierID ."</td><td> " . $Zoek->Naam ."</td><td> " .  $Zoek->Leeftijd ."</td><td> " .  $Zoek->Soort ."</td><td>" .$Zoek->Verblijfnaam ."</td></tr>";
					
				}echo "</table>";
			}
		}
	}		
}
else{
	$query = "SELECT * FROM tijd, dieren, verblijf WHERE dieren.DierID=tijd.DierID AND verblijf.VerblijfID=tijd.VerblijfID AND dieren.naam!='' ORDER BY naam"; 
	$stm = $con->prepare($query);
		if ($stm->execute()) {
		$result=$stm->fetchAll (PDO::FETCH_OBJ); 
		echo "<table><tr> <th> ID </th><th>Naam </th><th>Leeftijd </th><th>Soort </th><th> Verblijf</th></tr><br/>";
			foreach ($result as $naam)
			{
				//var_dump($result);
				echo "<tr> <td>" . $naam->DierID ."</td><td> " . $naam->Naam ."</td><td> " .  $naam->Leeftijd ."</td><td> " .  $naam->Soort ."</td><td>" .$naam->Verblijfnaam ."</td></tr>" ;
	
			}
		echo "</table>";}
		else
			{
			echo "verbinding mislukt";
			}
	}

$query="SELECT * FROM dieren,verblijf,tijd WHERE dieren.Naam='' AND dieren.DierID=tijd.DierID AND verblijf.VerblijfID=tijd.VerblijfID";
$stm=$con->prepare($query);
if ($stm->execute()){
	$result=$stm->fetchAll (PDO::FETCH_OBJ);

echo "<br/><br/><h3>Lege Hokken</h3><table><tr> <th> ID </th><th>Naam </th><th>Leeftijd </th><th>Soort </th><th> Verblijf</th></tr><br/>";
	foreach ($result as $naam){
		//var_dump($result);
		echo "<tr> <td>" . $naam->DierID ."</td><td> " . $naam->Naam ."</td><td> " .  $naam->Leeftijd ."</td><td> " .  $naam->Soort ."</td><td>" .$naam->Verblijfnaam ."</td></tr>" ;
	
	}
	echo "</table>";}
else
{
echo "verbinding mislukt";
}
echo "</div>"


?> </body>
</html>
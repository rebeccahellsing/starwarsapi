<html>
	<meta charset='UTF-8'>
	<head>
		<title>Inlämningsuppgif 1 - Star Wars - Undersida Karaktärer</title>
		<link href="../style.css" type="text/css" rel="stylesheet"/> <!-- Style css-->
	</head>
	<body>
	 <nav>
		<!-- Logga -->
		<div id="logotype">
			<a href="../index.php"><img src="../picture/logga.png" alt="logotyp"/></a>
       	</div>
		
		<!-- Navigation meny --> 
		<div class="menu">
		    <ul>
	          <li><a href="../index.php"> HEM</a></li>
	    	  <li><a href="karaktar.php" id="thisSection">KARAKTÄRER</a></li>
	          <li><a href="planeter.php">PLANETER</a></li> 
	        </ul>
	    </div>

	     <!--Sökfunktion och knapp -->			
		<form method="post" action="">
		    <div class="searchGroup">
		      <input type="text" class="form-control" name="searchfield"/>
		      <input type="submit" class="button" name="search" value="Sök" />
		      <input type="submit" class="button" name="showFile" value="Visa alla filmer" />
		    </div>
		</form>
	 </nav> 	

<?php
		//Omslutande box (infoBoxSubpages) som har informationen (rubrik och data från API). 
		echo '<div class="infoBoxSubpages">'; 
		echo "<h3>Undersida Karaktärer</h3>";
	
		//---------------Hämtar API från https://swapi.co ------------------------
		$swFile = file_get_contents("https://swapi.co/api/people/"); //Hämtar filen från api
		$swData = json_decode($swFile, true); //Konventerar om filen till json
		$swResult = $swData['results']; // Går in i json strukturen. 
	

		echo "<ol>"; // Numrerad lista
		//Foreach-loopen går igenom varje nyckel i json-filen och därefter skriver ut namnet av planeten. 
		foreach ($swResult as $swkey) {
				echo ("<li>".$swkey['name']."</li>");	
		}
		echo "</ol>"; 
		echo '</div>'; //Slut information
   ?> <!--Slut php -->
  </body>
</html>
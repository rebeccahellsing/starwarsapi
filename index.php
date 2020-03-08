<html>
	<meta charset='UTF-8'>
	<head>
		<title>Inlämningsuppgif 1 - Star Wars - Ingångssidan</title>
		<link href="style.css" type="text/css" rel="stylesheet"/> <!-- Style css-->
	</head>
	<body>
		<nav>
		<!-- Logga -->
		<div id="logotype">
			<a href="index.php"><img src="picture/logga.png" alt="logotyp"/></a>
       	</div>
		<!-- Navigation meny -->  
		<div class="menu">
			  <ul>
	            <li><a href="index.php" id="thisSection"> HEM</a></li>
	    		<li><a href="html/karaktar.php">KARAKTÄRER</a></li>
	    		<li><a href="html/planeter.php">PLANETER</a></li> 
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
	</nav> 	<!-- Slut navigation-->

<?php
	//Om (if) användaren klickar på knappen "sök" skickas värdet från sökrutan vidare som argumentet till funktionen search. 
	//Om (else) annars anropas funktionen showAllFromFile

	if (isset($_POST["search"])) {
		search($_POST['searchfield']); 
		} 
    else{
        showAllFromFile();
	   	}
      
//---------------Hämtar från json ------------------------
//$file hämtar alla värden som finns i den lokala json-filen
//$data gör att scriptet tolkar innehållet som json. 
//foreach loopen går genom nycklarna i json filen och tar ut värdena som skrivs ut med echo.  
function showAllFromFile() {

    $file = file_get_contents("./json/movies.json");
    $data = json_decode($file, true);

    foreach($data as $item) {
    	echo '<div class="infoBox">'; //Omslutande box
    	echo "</br>";
        echo '<img src="'.$item["img"].'" class="imgValue" >'; 
        echo "</br>";
        echo '<div class="info">'; //Information
        echo "<p>Title: " .$item["title"]. "</p>";
        echo "</br>";
        echo "<p>Director: ".$item["director"]. "</p>";
        echo "</br>";
        echo "<p>Created: ".$item["created"]. "</p>";
        echo "</br>";
        echo "<p>Episode: ".$item["episode"]. "</p>";
        echo "</br>";
        echo "<p>Characters: ".$item["charaters"]. "</p>";
        echo "</br>";
        echo "<p>Description: ".$item["description"]. "</p>";
        echo "</br>";echo "</br>";
        echo '</div>'; //Slut information
        echo '</div>'; // Slut omslutande box
 	} // Slut for-loop   
} //Slut showAllFromFile funktion 


//---------------Sökfunktion ------------------------
//$file visar alla värden som finns i den lokala json-filen
//$data gör att scriptet tolkar innehållet som json. 
//foreach loopen går genom nycklarna i json filen och tar ut värdena. 
function search($searchValue) {

    $file = file_get_contents("./json/movies.json");
    $data = json_decode($file, true);
    $boolean = false; //Boolean flaga verifierar titel.  
       
    foreach($data as $key => $value) {
    	$title = $value["title"];
     	
     	//if satsen använder uttrycket stringposition för att komma runt case sensetivety när den matchar med värdet i sökrutan. 
    	// finns inte titel retuneras värdet med false.
    	//Där efter skrivs det ut med echo.  
     	if (stripos($title, $searchValue) !== false) {
	        echo '<div class="infoBox">'; //Omslutande box justera class namn och bilderna i css! 
    		echo "</br>";
	        echo '<img src="'.$value["img"].'" class="imgValue" >'; 
	        echo "</br>";
	        echo '<div class="info">'; 
	        echo "<p>Title: " .$value["title"]. "</p>";
	        echo "<br/>";
	        echo "<p>Director: ".$value["director"]. "</p>";
	        echo "<br/>";
	        echo "<p>Created: ".$value["created"]. "</p>";
	        echo "<br/>";
	        echo "<p>Episode: ".$value["episode"]. "</p>";
	        echo "<br/>";
	        echo "<p>Characters: ".$value["charaters"]. "</p>";
	        echo "<br/>";
	        echo "<p>Description: ".$value["description"]. "</p>";
	        echo "<br/>";
	        echo '</div>'; 
        	echo '</div>'; 
	        
	        $boolean = true; // Sätter boolean flagan till true i samband med att titel hittas. 
	        //break; // Kan användas för att endast få ut ett alternativ. När titel hittas bryts loopen  
	    } 
    } 
		
		//boolean verifierar om titel har identifieras med false då skrivs "Filmen du söker finns inte". 
       	if ($boolean == false) {
       		echo '<div class="infoBoxWrongMessage">'; //Omslutande box
  			echo "<h3>Filmen du söker finns inte</h3>";
  			echo "<p>Tyvärr finns inte filmen som du söker efter.</p>";
  			echo "<p>Kontrollera om du har stavat rätt och använder stor bokstav i början.</p>";
  			echo '</div>'; //Slut information
        } 
   	   } //Slut search funktion
	?> <!--Slut php -->
  </body>
</html>
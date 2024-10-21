<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Carousel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body>

<div class="container-fluid">
<br>







	<?php
	function carousel($directory,$screenheight=80, $autorun=1, $bullets=1, $leftRight=1){
	
		if($autorun==0){$auto="data-interval='false'";}else{$auto="";}
		$files = scandir($directory);
		$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
		$imageFiles = [];//dit is een array of een lijst. In één variabele kan je meerdere variabelen opslaan. Momenteel is deze nog leeg
		foreach ($files as $file) {
			$fileExtension = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array(strtolower($fileExtension), $allowedExtensions)) {
				$imageFiles[] = $file;
			}
		}
		echo"<div id='myCarousel' class='carousel slide' data-ride='carousel' ".$auto.">";
		   
			///bolletjes
			if((count($imageFiles) >1) && ($bullets==1)){
				echo" <ol class='carousel-indicators'>";
				for($x=0; $x<count($imageFiles); $x++){
					if($x==0){$ac="active";}else{$ac="";}
					echo"<li data-target='#myCarousel' data-slide-to='".$x."' class='".$ac."'></li>";
				}
				echo"</ol>";
			}

			///afbeeldingen
			echo"<div class='carousel-inner'>";
			for($x=0; $x<count($imageFiles); $x++){
				if($x==0){$ac="active";}else{$ac="";}
				echo"<div class='item ".$ac."' STYLE=\"height:".$screenheight."vh; background-image:url('".$directory."/".$imageFiles[$x]."'); 
				background-size:cover; background-position: center center;\">";
				echo"</div>";
			}
			echo"</div>";

			//// links rechts
			if((count($imageFiles) >1) && ($leftRight==1)){
				echo"<a class='left carousel-control' href='#myCarousel' data-slide='prev'>";
				echo"<span class='glyphicon glyphicon-chevron-left'></span>";
				echo"<span class='sr-only'>Previous</span>";
				echo"</a>";
				
				echo"<a class='right carousel-control' href='#myCarousel' data-slide='next'>";
				echo"<span class='glyphicon glyphicon-chevron-right'></span>";
				echo"<span class='sr-only'>Next</span>";
				echo"</a>";
			}
		echo"</div>";
	}
	
	
	
	
	
	$directory= './afbeeldingen'; 
	carousel($directory);
	?>
	
	
	
	
	
	
	
	
	
	
	
</div>
</body>
</html>

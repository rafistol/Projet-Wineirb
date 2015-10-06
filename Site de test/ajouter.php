<!DOCTYPE html>
<html>
<head>
<body>
<meta charset="UTF-8">
<title>Ajouter</title>
<style type="text/css">
body {
	padding-left: 11em;	
	font-family: Georgia, "Times New Roman",
          Times, serif;
	background-color: #F4FF3A }

 h1 {color: red; }

ul.navbar {
    position: absolute;
    top: 2em;
    left: 1em;
    width: 17em }

  h3 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif;
	color: red } 
</style> 


<center><h1><u>Ajouter un ordinateur </u></h1>
<br></br>
<br></br>
<br></br>
<br></br>

<ul class="navbar">
<i><h3><img src="http://www.actufoot06.com/webroot/images/navigation/home_logo.png"> <a href="phphome.php">Revenir à l'acceuil</a><br></br><br></br>
<img src="http://www.cloudns.net/images/web/delete.png"> <a href="suppression.php">Supprimer un serveur</a><br></br>
  <img src="http://www.clipart-fr.com/data/clipart/fleches/clipart_fleches_0281.png"> <a href="deplacer.php">Déplacer un ordi client d'un local à un autre</a>
  </i>
</ul>

<?php
ini_set('display_errors',1) ; 
error_reporting(E_ALL) ;
$db = pg_connect("host=localhost port=5432 dbname=rturmeau user=rturmeau password=vKSbHVvY") ;
$result = pg_query($db, "SELECT nom FROM Locaux") ;
?>
	<form action="ajout2.php" method="get">
    <SELECT name="Local" size="1" type="text">
        <?php
			while($row = pg_fetch_assoc($result)) {
            $nom = $row['nom'] ;
        ?>
    <option values=" <?php echo $nom; ?>"> <?php echo $nom; ?> </option>
        <?php
        } 
        ?>
    </SELECT>
	<input type="submit" value="Ajouter" />
    </form>
	
</html></head></body></meta>


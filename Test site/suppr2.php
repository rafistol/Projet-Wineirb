<!DOCTYPE html>
<html><head><body><meta charset="UTF-8">
<title>Suppression</title>
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
<?php $nom = $_GET["Serveur"]; ?>
<center><h1><u>Supprimer un ordinateur client</u></h1><br></br><br></br>
<center><h3>Le serveur <?php echo $nom ?> sélectionné a été supprimé</h3></center>

<br></br><br></br>

<ul class="navbar">
<i><h3><img src="http://www.actufoot06.com/webroot/images/navigation/home_logo.png"> <a href="phphome.php">Revenir à l'accueil</a><br></br><br></br>
<img src="https://cdn1.iconfinder.com/data/icons/woothemesiconset/16/add.png"> <a href="ajouter.php">Ajouter un nouvel ordi client</a><br></br>
<img src="http://www.clipart-fr.com/data/clipart/fleches/clipart_fleches_0281.png"><a href="deplacer.php">Déplacer un ordi client d'un local à un autre</a></i>
</ul>


<?php 
ini_set('display_errors',1) ;
error_reporting(E_ALL) ;
?>
	<?php
	$db = pg_connect("host=localhost port=5432 dbname=rturmeau user=rturmeau password=vKSbHVvY") ;
	$result = pg_query($db, "SELECT nom FROM Ordi_Serveurs");
	
		$query1 = "SELECT id FROM Ordi_Serveurs WHERE nom='$nom'";
		
		$id = pg_query($db, $query1);
		$id2= substr("$id",13);
		
		$query2 = "DELETE FROM Ordi_Serveurs WHERE id=$id2";
		
	$result = pg_query($db, $query2);
    ?>
			
            

</html></head></body></meta>

<!DOCTYPE html>
<html>
<head>
<body>
<meta charset="UTF-8">
<title>Deplacer</title>
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
<?php 
$ordi = $_GET["Ordi"];
$local = $_GET["Local"]; 
?>

<center><h1><u>Déplacer un ordinateur client d'un local à un autre</u></h1><br></br><br></br>
<h3>L'ordinateur client <?php echo $ordi ?> a été déplacé dans <?php echo $local ?> </h3>

<br></br><br></br><br></br>

<ul class="navbar">
<i><h3><img src="http://www.actufoot06.com/webroot/images/navigation/home_logo.png"> <a href="phphome.php">Revenir à l'accueil</a><br></br><br></br>
<img src="http://www.cloudns.net/images/web/delete.png"><a href="suppression.php">Supprimer un serveur</a><br></br>
<img src="https://cdn1.iconfinder.com/data/icons/woothemesiconset/16/add.png"> <a href="ajouter.php">Ajouter un nouvel ordi client</a><br></br>
</i>
</ul>

<?php 
ini_set('display_errors',1) ; 
error_reporting(E_ALL) ;
$db = pg_connect("host=localhost port=5432 dbname=rturmeau user=rturmeau password=vKSbHVvY") ;
$result = pg_query($db, "SELECT nom FROM Ordi_Clients") ;
?>

<?php 
$query1 = "SELECT id FROM Ordi_Clients WHERE nom='$ordi'";
$idordi = pg_query($db, $query1);
$idordi2= substr("$idordi",13);

$query2 = "SELECT id FROM Locaux WHERE nom='$local'";
$idlocal = pg_query($db, $query2);
$idlocal2= substr("$idlocal",13);

$query3 = "UPDATE Ordi_Clients SET id_locaux = $idlocal2 WHERE id = $idordi2";

$result = pg_query($db, $query3); 
?>

</html></head></body></meta>
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


<center><h1><u>Déplacer un ordinateur client d'un local à un autre</u></h1>
<br></br>
<br></br>
<br></br>
<br></br>

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
	<form action="depl2.php" method="get">
    <SELECT name="Ordi" size="1" type="text">
        <?php
			while($row = pg_fetch_assoc($result)) {
            $nom = $row['nom'] ;
        ?>
    <option values=" <?php echo $nom; ?>"><?php echo $nom; ?> </option>
        <?php
        } 
        ?>
    </SELECT>
	
<?php   
$result2 = pg_query($db, "SELECT nom FROM Locaux") ;
?>
    <form action="depl2.php" method="get">
    <SELECT name="Local" size="1" type="text">
        <?php
            while($row = pg_fetch_assoc($result2)) {
            $nom2 = $row['nom'] ;
        ?>
    <option values=" <?php echo $nom2; ?>"> <?php echo $nom2; ?> </option>
        <?php
        } 
        ?>
    </SELECT>

	<input type="submit" value="Déplacer" />
    </form>

</html></head></body></meta>
<!DOCTYPE html>
<html><head><body><meta charset="UTF-8">
<title>Suppression</title>
<style type="text/css"> <!--Partie CSS de la page html-->
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
<center><h1><u>Supprimer un ordinateur client</u></h1><br></br><br></br><br></br><br></br>

<ul class="navbar"> <!--Barre de navigation -->
<i><h3><img src="http://www.actufoot06.com/webroot/images/navigation/home_logo.png"> <a href="phphome.php">Revenir à l'accueil</a><br></br><br></br>
<img src="https://cdn1.iconfinder.com/data/icons/woothemesiconset/16/add.png"> <a href="ajouter.php">Ajouter un nouvel ordi client</a><br></br>
<img src="http://www.clipart-fr.com/data/clipart/fleches/clipart_fleches_0281.png"><a href="deplacer.php">Déplacer un ordi client d'un local à un autre</a>
</i>
</ul>

<?php //Pour avoir le message d'erreur directement sur la page php
ini_set('display_errors',1) ;
error_reporting(E_ALL) ;
?>
	<?php //Se connecter à la base de donnée Postgresql
	$db = pg_connect("host=localhost port=5432 dbname=rturmeau user=rturmeau password=vKSbHVvY") ;
	$result = pg_query($db, "SELECT nom FROM Ordi_Serveurs"); //résultat de la requête entre ".."
	?>
	<center>
	<form action="suppr2.php" method="get"> 
	<SELECT name="Serveur" size="2" type="text"> <!-- HTML : Permet de créer un formulaire, l'action de type get renvoie sur la deuxième page suppr2.php 
											qui comporte le fonctionnement de la requête pour supprimer le serveur / SELECT : Options du formulaire -->
    
           <?php
            while($row = pg_fetch_assoc($result)) {
                $nom = $row['nom'] ; //Tant que la variable $row associera un résultat,la variable $nom prendra la valeur suivante, 
				//c'est une boucle while Cette variable £nom sera dans la liste du formulaire
			?>
                <option values="<?php echo $nom; ?>"><?php echo $nom; ?></option> <!--HTML: Pour le formulaire (les éléments de la liste), il y a deux "echo"
				pour les deux sélections (affichage dans la liste déroulante et hors liste déroulante) -->
            <?php
            } //fin de colonne
            ?>
			
	</SELECT>
    <input type="submit" value="Supprimer" /> <!-- Pour ajouter un bouton Supprimer -->
    </form></center>
	
</html></head></body></meta>


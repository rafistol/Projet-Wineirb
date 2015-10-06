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
<?php $local = $_GET["Local"]; ?>

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

<?php //Lignes classiques pour se connecter à la db, afficher les erreurs sur la page
ini_set('display_errors',1) ; 
error_reporting(E_ALL) ;
$db = pg_connect("host=localhost port=5432 dbname=rturmeau user=rturmeau password=vKSbHVvY") ;
?>

<?php  //Nouveau nom de l'ordi
$query1="SELECT COUNT(*) FROM Ordi_Clients";
$comptage = pg_query($db, $query1);
$comptage2 = substr("$comptage",13);
$comptage3 = $comptage2++;
$nomordi="PC-".$comptage3
?>

<?php //Génération nouvelle @MAC
$rand1= openssl_random_pseudo_bytes(1);
$hex1= bin2hex($rand1);

$rand2= openssl_random_pseudo_bytes(1);
$hex2= bin2hex($rand2);
$rand3= openssl_random_pseudo_bytes(1);
$hex3= bin2hex($rand3);
$rand4= openssl_random_pseudo_bytes(1);
$hex4= bin2hex($rand4);
$rand5= openssl_random_pseudo_bytes(1);
$hex5= bin2hex($rand5);
$rand6= openssl_random_pseudo_bytes(1);
$hex6= bin2hex($rand6);

$mac="$hex1:$hex2:$hex3:$hex4:$hex5:$hex6";
?>      
        
<?php //Génération nouvel id réseau + id local
$query2 ="SELECT id FROM Locaux where nom='$local'";
$idlocal = pg_query($query2);
$idlocal2= substr("$idlocal",13);
       
$query3= "SELECT id_reseaux FROM Reseaux_Locaux where id_locaux=$idlocal2";
$idreseau=pg_query($query3);
$idreseau2= substr("$idreseau",13);
?>
       
<?php //Génération nouvelle @IP
$ipfin=int rand( int 101 , int 254 )
	if $idlocal2=1{
	$ip="192.168.1.".$ipfin;
		}else if $idlocal2=2{
		$ip="192.168.2.".$ipfin;
			}else if $idlocal2=3{
			$ip="192.168.3.".$ipfin;
				}else{
				$ip="192.168.4.".$ipfin;
				}endif;
?>
        
<?php //Requête finale MAJ dans la table Ordi_Clients en fonction du nouveau pc
$queryEnd="INSERT INTO Ordi_Clients (nom, adresseMAC, adresseIP, id_reseaux, id_locaux) VALUES ('$nomordi','$mac' ,'$ip', $idreseau2, $idlocal2)";
?>
<br><br>

<h3>L'ordinateur <?php echo $nomordi ?> a bien été créé et ajouté dans le local <?php echo $local ?></h3>


</html></head></body></meta>


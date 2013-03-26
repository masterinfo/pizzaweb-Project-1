<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Création Flux RSS XML</title>
</head>

<body>
<?php 

$xml = '<?xml version="1.0" encoding="iso-8859-1" standalone="yes"?>';
//$xml .= '<rss version="0.91"><channel>';
$xml.='<ListePizza>';
/******************************************CONNEXION SQL ****************************************************/
$con=mysqli_connect('localhost','root','','pizzabox');
/************************************************************************************************************/
$sql_req="select * from pizza;";/***************************SELECT INFO PIZZA********************************/
$req=mysqli_query($con,$sql_req);

while ($ligne= mysqli_fetch_array($req))
{
	$xml.="<item><nom_pizza>".$ligne['DesignPizz']."</nom_pizza>";//************ECRITURE DU FICHIER XML******/
	$xml.="<tarif_pizza>".$ligne['TarifPizz']."</tarif_pizza>";
	$xml.="<numero_pizza>".$ligne['NroPizz']."</numero_pizza></item>";
}
//$xml.='</channel></rss>';
$xml.='</ListePizza>';
file_put_contents("fluxpizza.xml",$xml);
mysqli_close($con);

echo 'AFFICHAGE DU FLUX:';

/* doit y avoir mieux que de faire un include....*/


?>
<div style="width:200px;"><?php include('fluxpizza.xml');?></div>
</body>
</html>
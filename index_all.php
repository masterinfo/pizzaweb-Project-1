<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pizzaweb</title>
<link href="pizzacss.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 

 
/******************************************CONNEXION SQL ****************************************************/
$con=mysqli_connect('localhost','root','','pizzabox');
/************************************************************************************************************/
$sql_req="select * from pizza;";/***************************SELECT INFO PIZZA********************************/
$req=mysqli_query($con,$sql_req);
echo 'AFFICHAGE Des pizzas :';echo ("</br>");
echo("<div id=Listepizza >");
while ($ligne= mysqli_fetch_array($req))
{
	echo("<div class='pizza' >");
	echo("Désignation  : ".$ligne['DesignPizz']."</br>"); 
	echo("tarif pizza  : ".$ligne['TarifPizz']."</br>");
	echo(" numero_pizza: ".$ligne['NroPizz']."</br>");
	echo("</div>");
}
echo("</div>"); 
mysqli_close($con);



/* doit y avoir mieux que de faire un include....*/


?>

</body>
</html>
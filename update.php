<?php 
require "sistemaVPD.php";

/*POST nos permite recuperar datos enviados desde formularios con el método POST. Se envía de forma no visible*/
$ci=$_POST["txtci"];
$pat=$_POST["txtPaterno"];
$mat=$_POST["txtMaterno"];
$nom=$_POST["txtNombre"];
$fecha=$_POST["fechaNac"];
$dir=$_POST["txtDir"];

/*echo $ci."<br>";
echo $pat."<br>";
echo $mat."<br>";
echo $nom."<br>";
echo $fecha."<br>";
echo $dir."<br>";*/

$sql="update empleado set ci='$ci',paterno='$pat',materno='$mat',nombres='$nom', fechaNac='$fecha', direccion='$dir' WHERE ci='$ci'";

/*echo $sql;*/

$obj=new sistemaVPD();
$obj->update($sql);
header("location: CRUD.php");
exit();
?>
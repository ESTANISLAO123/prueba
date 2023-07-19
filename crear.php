<?php 
/*Cuando PHP analiza un fichero, busca las etiquetas de apertura y cierre, que son <?php y ?>, y que indican a PHP dónde empezar y finalizar la interpretación del código.*/

/*La declaración include(o require) toma todo el texto que existe en el archivo especificado y lo copia en el archivo que usa la declaración de inclusión.*/
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

/*inert into; Declaración que se utiliza para insertar nuevos registros en una tabla.*/
$sql="insert into empleado(ci,paterno,materno,nombres,fechaNac,direccion) values('$ci','$pat','$mat','$nom','$fecha','$dir')";

/*echo $sql;*/

$obj=new sistemaVPD();
$obj->update($sql);
/*header; es usado para enviar encabezados HTTP sin formato*/
header("location: CRUD.php");

/*Finaliza la ejecución del script*/
exit();
?>


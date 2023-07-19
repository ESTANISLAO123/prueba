<?php 
require "sistemaVPD.php";
$ci=$_GET["ci"];
$obj=new sistemaVPD();
$obj->eliminar($ci);
header("location: CRUD.php");
exit();
?>


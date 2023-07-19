<?php 
require "sistemaVPD.php";
$obj=new sistemaVPD();

/*El método GET envía la información codificada del usuario en el encabezado de la solicitud HTTP , directamente en la URL.La página web y la información codificada se separan por un interrogante '?'. Se envía de forma visible*/
$ci=$_GET["ci"];
$sql="SELECT * FROM empleado WHERE ci='$ci'";
if($result=mysqli_query($obj->con, $sql)){
    if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){?>

 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<!--py = padding-top y padding-botton-->
<!--py = padding-left y padding-right-->
<!--lead; para destacar parrafos-->
<div class="container py-4 px-4 bg-dark mx-auto text-white" style="width: 500px;">
<form class="form-horizontal" action="update.php" method="post">   
        <div class="form-group">        
          <label class="control-label col-sm-6 lead text-danger bg-success">Carnet de identidad</label>        
         
            <input type="text" class="form-control"  name="txtci" value="<?php echo $row['ci']?>" size=50  autofocus="autofocus" required="required" />
           
        </div>
        <div class="form-group">        
          <label class="control-label col-sm-3 lead">Paterno</label>        
         
            <input type="text" class="form-control"  name="txtPaterno" value="<?php echo $row['paterno']?>" size=50   required="required" />
          
        </div>
      <div class="form-group">        
        <label class="control-label col-sm-3 lead">Materno</label>        
      
          <input type="text" class="form-control"  name="txtMaterno" value="<?php echo $row['materno']?>" size=50   required="required" />
       
      </div>
      <div class="form-group">        
        <label class="control-label col-sm-3 lead text-uppercase">Nombre</label>        
      
          <input type="text" class="form-control text-uppercase"  name="txtNombre" value="<?php echo $row['nombres']?>" size=50   required="required" />
     
      </div>
      <div class="form-group">        
        <label class="control-label col-sm-6 lead">Fecha de nacimiento</label>   
        <div class="col-sm-5">      
          <input type="date" class="form-control " name="fechaNac"  value="<?php echo $row['fechaNac']?>"/>
        </div>   
      </div>
      <div class="form-group">        
        <label class="control-label col-sm-3 lead">Direccion</label>        
       
          <input type="text" class="form-control"  name="txtDir" value="<?php echo $row['direccion']?>" size=50   required="required" />
     
      </div>

  <div class="form-group text-right"> 
        <a href="CRUD.php"><input type="button" class="btn btn-secondary" value="Cerrar"/></a>
         <input type="submit" class="btn btn-primary"  value="Aceptar">           
    </div>
</form>
</div>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>



<?php  
}
mysqli_free_result($result);
        } else{
            echo "<p class='lead'><em>No se tiene Registros</em></p>";
        }
} else{
    echo "No puede ejecutar la CONSULTA" . mysqli_error($obj->con);
}
mysqli_close($obj->con);
?>
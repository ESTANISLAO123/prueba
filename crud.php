<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Control de EMPLEADOS</title>

    <style>
   body{

    background:url("img/fondo1.jpg"); 
   }
  </style>
  </head>
<body>   
  <div class="page-header clearfix">
      ><h2 class="text-success text-right">Registro de EMPLEADOS</h2>
  </div>
    <!-- Button trigger modal -->
<div class="">
	<!--data-toggle="modal"abre la ventana modal
		data-target="#exampleModal", apunta a la identificación del modal
	-->
  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
  Adicionar empleado
  </button>

</div>
<!-- Modal -->
<!--El complemento Modal es un cuadro de diálogo/ventana emergente que se muestra en la parte superior de la página actual
La clase .fade agrega un efecto de transición que desvanece el modal hacia adentro y hacia afuera. Eliminaesta clase si no quieres este efecto.
-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar EMPLEADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="crear.php" method="post">   

        <div class="form-group">        
          <label class="control-label col-xs-2">Carnet de identidad</label>        
          <div class="col-xs-5">
            <input type="text" class="form-control"  name="txtci" value="" size=50  autofocus="autofocus" required="required" />
          </div>    
        </div>
        <div class="form-group">        
          <label class="control-label col-xs-2">Paterno</label>        
          <div class="col-xs-5">
            <input type="text" class="form-control"  name="txtPaterno" value="" size=50   required="required" />
          </div>    
        </div>
      <div class="form-group">        
        <label class="control-label col-xs-2">Materno</label>        
        <div class="col-xs-5">
          <input type="text" class="form-control"  name="txtMaterno" value="" size=50   required="required" />
        </div>    
      </div>
      <div class="form-group">        
        <label class="control-label col-xs-2">Nombre</label>        
        <div class="col-xs-5">
          <input type="text" class="form-control"  name="txtNombre" value="" size=50   required="required" />
        </div>    
      </div>
      <div class="form-group">        
        <label class="control-label col-xs-2">Fecha de nacimiento</label>   
        <div class="col-xs-3">      
          <input type="date" class="form-control " name="fechaNac"  value="">
        </div>   
      </div>
      <div class="form-group">        
        <label class="control-label col-xs-2">Direccion</label>        
        <div class="col-xs-5">
          <input type="text" class="form-control"  name="txtDir" value="" size=50   required="required" />
         </div>    
      </div>

</div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         <input type="submit" class="btn btn-primary"  value="Enviar">           
  </div>
</div>
</form>
</div>
</div>

<!--Codigo php-->
<?php                
require "sistemaVPD.php";
$obj=new sistemaVPD();
$sql = "SELECT * FROM empleado";
if($result=mysqli_query($obj->con, $sql)){
	/*mysqli_num_rows; Obtiene el número de filas en el conjunto de resultados*/
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped table-dark'>";
        echo "<tr>";
        echo "<th>ci</th>";
        echo "<th>Paterno</th>";
        echo "<th>Materno</th>";
        echo "<th>Nombres</th>";
        echo "<th>Fecha Nac.</th>";
    echo "<th>Direccion</th>";
        echo "</tr>";
        
		/*mysqli_fetch_array; Obtener la siguiente fila de un conjunto de resultados como una matriz asociativa, numérica o ambas*/                        
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['ci'] . "</td>";
            echo "<td>" . $row['paterno'] . "</td>";
            echo "<td>" . $row['materno'] . "</td>";
            echo "<td>" . $row['nombres'] . "</td>";
            echo "<td>" . $row['fechaNac'] . "</td>";
      echo "<td>" . $row['direccion'] . "</td>";
            echo "<td>"; 
            echo "<a href='consulta.php?ci=". $row['ci'] ."' title='Editar' data-toggle='tooltip'><button type='button' class='btn btn-outline-success'>Editar</button></a>";
                echo "<a href='Eliminar.php?ci=". $row['ci'] ."' title='Delete Record' data-toggle='tooltip'><button type='button' class='btn btn-outline-light btn-hover-text-light'>Eliminar</button></a>";
                echo "</td>";
                echo "</tr>";
        }
                                          
        echo "</table>";  

        echo "<a href='index.html' title='Pagina Principal' data-toggle='tooltip'><button type='button' class='btn btn-warning'>Atras...</button></a>";

        mysqli_free_result($result);
        } else{
            echo "<p class='lead'><em>No se tiene Registros</em></p>";
        }
} else{
    echo "No puede ejecutar la CONSULTA" . mysqli_error($obj->con);
}
mysqli_close($obj->con);
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
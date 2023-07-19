<?php
class sistemaVPD{
	//__construct(); es un método especial de una clase. El objetivo fundamental del constructor es inicializar los atributos del objeto que creamos.
	function __construct(){
		try{
			//declarando variables		
				$host="localhost";
				$nomBD="banco";
				$user="root";
				$password="";
				
				//mysqli_connect; Esta función nos permite crear una conexión con una base de datos. La función devuelve una conexión almacenada en la variable $con, o FALSE en caso de error.
				$this->con=mysqli_connect($host,$user,$password) or die ("Error en la conexion a la BD");
				
				//mysqli_select_db(; funcion que selecciona la base de datos por defecto (específicada por el parámetro dbname ) a ser usada cuando se ejecuten consultas sobre la conexión
				mysqli_select_db($this->con,$nomBD) or die ("Error en la BD");
				
				}catch(Exception $ex){
					throw $ex;
					}
		}
		
		function consultar($sql){
			$res=mysqli_query($this->con,$sql);
			$data=NULL;
			//mysqli_fetch_assoc();funcion que devuelve una representación asociativa de la siguiente fila en el resultado, representado por el parámetro fila.
			while($fila=mysqli_fetch_assoc($res)){
				$data[]=$fila;
				}
				return $data;
		}
			
	public function update($sql){
		//mysqli_query; Realiza una consulta dada por query a la base de datos
		mysqli_query($this->con, $sql);
		//mysqli_affected_rows(); Funcion que regresa el número de filas afectadas por la última consulta INSERT, UPDATE, o DELETE. Si la última consulta fue invalida, esta función devuelve -1.
		if(mysqli_affected_rows($this->con)<=0){
			echo "No se pudo realizar lo pedido";
			}else{
				echo "Se ha realizado los cambios con EXITO";
				}
		}
		
		
public function eliminar($ci){ 
    //$sqlDelete = "DELETE FROM empleado"."WHERE ci = '".$ci."'";
    try { 
	$delete = mysqli_query($this->con, "DELETE FROM empleado WHERE ci='$ci'"); 
	if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
	   //$this->con->exec($sqlDelete);      
    } catch (Exception $exception) {            
        echo 'Error al eliminar al EMPLEADO '.$exception->getMessage();
        exit();
    }
}   

}
?>
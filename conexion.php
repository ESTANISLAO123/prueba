<?php
/*class; Palabra reservada que permite definir una clase en PHP*/
class conexion{
	/*__construct; metodo especial que permite inicializar el objeto con valores validos*/
	/*try/catch; manejador de excepciones; errores en tiempo de ejecucion*/
	function __construct(){
		try{
			//declarando variables		
				$host="localhost";
				$nomBD="banco";
				$user="root";
				$password="";
				//cadena de conexion
				/*mysqli_connect; Abre una conexión al servidor MySQL:*/
				/*or die; Imprime un mensaje y sale del script actual:*/
				$this->con=mysqli_connect($host,$user,$password) or die ("Error en la conexion a la BD");
				//selecciono la base de datos "banco"
				mysqli_select_db($this->con,$nomBD) or die ("Error en la BD");
				
				}catch(Exception $ex){
					throw $ex;
					}
		}
					
public function update($sql){
		mysqli_query($this->con, $sql);
		if(mysqli_affected_rows($this->con)<=0){
			echo "No se pudo realizar lo pedido";
			}else{
				echo "Se ha realizado los cambios con EXITO";
				}
}
		
		
public function eliminar($ci){ 
    try { 
    /*mysqli_query () realiza una consulta en la base de datos.*/	
	$delete = mysqli_query($this->con, "DELETE FROM empleado WHERE ci='$ci'");      
    } catch (Exception $exception) {            
        echo 'Error al eliminar al EMPLEADO '.$exception->getMessage();
        exit();
    }
}   
}
?>
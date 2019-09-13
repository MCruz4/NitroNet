<?php 

class Conexion {
	public function conectar(){
		
		$usuario ="root";     
		$contraseña ="";   

		try { 
			$conn = new PDO('mysql:host=localhost;dbname=nitronet',$usuario,$contraseña);         
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			echo "Conexión establecida";      
			return $conn;
		} catch (PDOException $e) {         
			print "¡Error!:" . $e->getMessage() . "<br/>";         
			die();     
		} 
		
	}
}


 

?> 

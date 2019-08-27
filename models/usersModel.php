<?php
    require 'models/conexion.php';
class UsersModel{

    public function login($user, $passwd){
        $conn = Conexion::conectar();
        $stmt = $conn->prepare('SELECT * FROM users WHERE user = :usuario AND passwd = :passwd');
        $stmt->bindValue(':usuario', $user,PDO::PARAM_STR);
        $stmt->bindValue(':passwd', $passwd,PDO::PARAM_STR); 
        $stmt->execute();
        //Recorre y busca si hay algo en la tabla
        if($stmt->rowCount()){
            $fetchted = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $fetchted['user'];
            $_SESSION['userID'] = $fetchted['user_id'];
            $_SESSION['userType'] = $fetchted['user_type'];
            return true;
        }else{
        	return false;
        }
    }


}

	//public function userExiste($usuario , $pass){
		//$stmt = $mdb->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :pass');
		//$stmt->bindValue(':usuario ,:pass',usuario, pass,PDO::PARAM_STR); 
        //$stmt->execute(['usuario'=> $usuario, 'pass'=> $pass]);
//Recorre y busca si hay algo en la tabla
        //if($query->rowCount()){
        	//return true;
        	//echo"<script>alert('Contiene Registros')</script>";
        //}else{
        	//return false;
        //}

/// IF DE SECCION SI USUARIO Y CONTRA ES IGUAL AL DE LA DB LO DEJA PASAR A INICIO.PHP
        //if(usuario==$usuario &  pass==$pass){
        //echo"<script>location.href="Inicio.php"</script>";
	//}else{
		//echo"<script>alert('El usuario no existe')</script>";
	//}
?>
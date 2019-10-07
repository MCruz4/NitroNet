<?php
// Incluimos la conexion a la base de datos
include_once 'db_conect/db_conect.php';
// Declaramos nuestra clase, la cual extiende de la base de datos.
class SucursalModel extends DB{

    // Creamos la funcion para obtener todos los valores
    function getAllData(){   
        // Iniciamos la conexion
        $conn = $this->connect();
        // Preparamos la consulta
        $stmt = $conn->prepare('SELECT * FROM sucursal');
            
        // Trataremos de ejecutar
        try{
            // Ejecutamos la consulta
            $stmt->execute();
            // Retornamos los valores obtenidos
            return $stmt;
        }catch(Exception $e){
            // Capturamos el error. y enviamos una respuesta nula.
            return null;
        }
    }

    // funcion para obtener valores por ID
    function getByIdData(int $id){   
        // Iniciamos la conexion
        $conn = $this->connect();
    
        // Preparamos la consulta
            $stmt = $conn->prepare('SELECT * FROM sucursal WHERE id_sucursal=:id_sucursal');     
        // Trataremos de ejecutar
        try{
            // Cargamos los parametros que utilizaremos.
            $stmt->bindParam(':id_sucursal', $id, PDO::PARAM_INT, 11);
            // Ejecutamos la consulta
            $stmt->execute();
            // Retornamos los valores obtenidos
            return $stmt;
        }catch(Exception $e){
            // Capturamos el error. y enviamos una respuesta nula.
            return null;
        }
    }

    
    // Creamos la funcion para insertar datos
    function insertOneData($array){
        // Conectamos a la base de datos
        $conn = $this->connect();
        //Preparamos la consulta
        $stmt = $conn->prepare("INSERT INTO sucursal VALUES (
            NULL , 
            :nom_sucursal ,
            :dir_sucursal,
            :tel1_sucursal,
            :tel2_sucursal,
            :correo_sucursal,
            :fec_mod_sucursal,
            :visible_sucursal);");

        try{
            // Cargamos los parametros requeridos.
            $stmt->bindParam(':nom_sucursal', $array['nom_sucursal'], PDO::PARAM_STR, 100);
            $stmt->bindParam(':dir_sucursal', $array['dir_sucursal'], PDO::PARAM_STR, 500);
            $stmt->bindParam(':tel1_sucursal', $array['tel1_sucursal'], PDO::PARAM_STR, 45);
            $stmt->bindParam(':tel2_sucursal', $array['tel2_sucursal'], PDO::PARAM_STR, 45);
            $stmt->bindParam(':correo_sucursal', $array['correo_sucursal'], PDO::PARAM_STR, 45);
            $stmt->bindParam(':fec_mod_sucursal', $array['fec_mod_sucursal'], PDO::PARAM_STR, time(oid));
            $stmt->bindParam(':visible_sucursal', $array['visible_sucursal'], PDO::PARAM_STR , int);
            // Ejecutamos la consulta   
            $stmt->execute();
            // Contamos los datos afectados
            $res = $stmt->rowCount();
            // Retornamos los valores obtenidos
            return $res;
        }catch(Exception $e){
            // Retornamos nulo en caso de un error
            return null;
        }
    }
}
?>
<?php
// Incluimos la conexion a la base de datos
include_once 'db_conect/db_conect.php';
// Declaramos nuestra clase, la cual extiende de la base de datos.
class Cat_destacadoModel extends DB{

    // Creamos la funcion para obtener todos los valores
    function getAllData(){   
        // Iniciamos la conexion
        $conn = $this->connect();
        // Preparamos la consulta
        $stmt = $conn->prepare('SELECT * FROM cat_destacado');
            
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
            $stmt = $conn->prepare('SELECT * FROM cat_destacado WHERE id_cat_destacado=:id_cat_destacado');     
        // Trataremos de ejecutar
        try{
            // Cargamos los parametros que utilizaremos.
            $stmt->bindParam(':id_cat_destacado', $id, PDO::PARAM_INT, 11);
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
        $stmt = $conn->prepare("INSERT INTO cat_destacado VALUES (
            NULL , 
            :nom_cat_destacado,
            :desc_cat_destacado,
            :fec_mod_cat_destacado,
            :visible_cat_destacado);");
        try{
            // Cargamos los parametros requeridos.
            $stmt->bindParam(':nom_cat_destacado', $array['nom_cat_destacado'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':desc_cat_destacado', $array['desc_cat_destacado'], PDO::PARAM_STR, 150);
            $stmt->bindParam(':fec_mod_cat_destacado', $array['fec_mod_cat_destacado'], PDO::PARAM_STR, time(oid)); 
            $stmt->bindParam(':visible_cat_destacado', $array['visible_cat_destacado'], PDO::PARAM_INT , int);
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
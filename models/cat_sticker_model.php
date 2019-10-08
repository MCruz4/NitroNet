<?php
// Incluimos la conexion a la base de datos
include_once 'db_conect/db_conect.php';
// Declaramos nuestra clase, la cual extiende de la base de datos.
class Cat_stickerModel extends DB{

    // Creamos la funcion para obtener todos los valores
    function getAllData(){   
        // Iniciamos la conexion
        $conn = $this->connect();
        // Preparamos la consulta
        $stmt = $conn->prepare('SELECT * FROM cat_sticker');
            
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
            $stmt = $conn->prepare('SELECT * FROM cat_sticker WHERE id_cat_sticker=:id_cat_sticker');     
        // Trataremos de ejecutar
        try{
            // Cargamos los parametros que utilizaremos.
            $stmt->bindParam(':id_cat_sticker', $id, PDO::PARAM_INT, 11);
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
        $stmt = $conn->prepare("INSERT INTO cat_sticker VALUES (
            NULL , 
            :nom_cat_sticker,
            :desc_cat_sticker,
            :fec_mod_cat_sticker,
            :visible_cat_sticker);");
        try{
            // Cargamos los parametros requeridos.
            $stmt->bindParam(':nom_cat_sticker', $array['nom_cat_sticker'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':desc_cat_sticker', $array['desc_cat_sticker'], PDO::PARAM_STR, 150);
            $stmt->bindParam(':fec_mod_cat_sticker', $array['fec_mod_cat_sticker'], PDO::PARAM_STR, time(oid)); 
            $stmt->bindParam(':visible_cat_sticker', $array['visible_cat_sticker'], PDO::PARAM_STR , int);
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
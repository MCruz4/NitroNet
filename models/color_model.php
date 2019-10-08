<?php
// Incluimos la conexion a la base de datos
include_once 'db_conect/db_conect.php';
// Declaramos nuestra clase, la cual extiende de la base de datos.
class ColorModel extends DB{

    // Creamos la funcion para obtener todos los valores
    function getAllData(){   
        // Iniciamos la conexion
        $conn = $this->connect();
        // Preparamos la consulta
        $stmt = $conn->prepare('SELECT * FROM color');
            
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
            $stmt = $conn->prepare('SELECT * FROM color WHERE id_color=:id_color');     
        // Trataremos de ejecutar
        try{
            // Cargamos los parametros que utilizaremos.
            $stmt->bindParam(':id_color', $id, PDO::PARAM_INT, 11);
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
        $stmt = $conn->prepare("INSERT INTO color VALUES (
            NULL , 
            :nom_color ,
            :imagen_color,
            :visible_presentacion);");
        try{
            // Cargamos los parametros requeridos.
            $stmt->bindParam(':nom_color', $array['nom_color'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':imagen_color', $array['imagen_color'], PDO::PARAM_STR, 250);
            $stmt->bindParam(':visible_presentacion', $array['visible_presentacion'], PDO::PARAM_STR , int);
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
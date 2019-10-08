<?php
// Incluimos la conexion a la base de datos
include_once 'db_conect/db_conect.php';
// Declaramos nuestra clase, la cual extiende de la base de datos.
class ServicioModel extends DB{

    // Creamos la funcion para obtener todos los valores
    function getAllData(){   
        // Iniciamos la conexion
        $conn = $this->connect();
        // Preparamos la consulta
        $stmt = $conn->prepare('SELECT * FROM servicio');
            
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
            $stmt = $conn->prepare('SELECT * FROM servicio WHERE id_servicio=:id_servicio');     
        // Trataremos de ejecutar
        try{
            // Cargamos los parametros que utilizaremos.
            $stmt->bindParam(':id_servicio', $id, PDO::PARAM_INT, 11);
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
        $stmt = $conn->prepare("INSERT INTO servicio VALUES (
            NULL , 
            :nom_servicio ,
            :desc_servicio,
            :coment_servicio,
            :revision,
            :visible_servicio);");
        try{
            // Cargamos los parametros requeridos.
            $stmt->bindParam(':nom_servicio', $array['nom_servicio'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':desc_servicio', $array['desc_servicio'], PDO::PARAM_STR, 250);
            $stmt->bindParam(':coment_servicio', $array['coment_servicio'], PDO::PARAM_STR, 250);
            $stmt->bindParam(':revision', $array['revision'], PDO::PARAM_STR, int);
            $stmt->bindParam(':visible_servicio', $array['visible_servicio'], PDO::PARAM_STR , int);
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
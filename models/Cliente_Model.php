<?php
// Incluimos la conexion a la base de datos
include_once 'db_conect/db_conect.php';
// Declaramos nuestra clase, la cual extiende de la base de datos.
class ClienteModel extends DB{

    // Creamos la funcion para obtener todos los valores
    function getAllData(){   
        // Iniciamos la conexion
        $conn = $this->connect();
        // Preparamos la consulta
        $stmt = $conn->prepare('SELECT * FROM clientes');
            
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
            $stmt = $conn->prepare('SELECT * FROM clientes WHERE id_cliente=:id_cliente');     
        // Trataremos de ejecutar
        try{
            // Cargamos los parametros que utilizaremos.
            $stmt->bindParam(':id_cliente', $id, PDO::PARAM_INT, 11);
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
        $stmt = $conn->prepare("INSERT INTO clientes VALUES (
            NULL , 
            :nom_cliente,
            :ape_cliente ,
            :dire_cliente ,
            :tele_cliente ,
            :dui_cliente ,
            :num_tarjeta ,
            :fec_vtarjeta ,
            :nom_titular ,
            :edad);");
        try{

            // Cargamos los parametros requeridos.
            $stmt->bindParam(':nom_cliente', $array['nom_cliente'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':ape_cliente', $array['ape_cliente'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':dire_cliente', $array['dire_cliente'], PDO::PARAM_STR, 150);
            $stmt->bindParam(':tele_cliente', $array['tele_cliente'], PDO::PARAM_STR, int);
            $stmt->bindParam(':dui_cliente', $array['dui_cliente'], PDO::PARAM_STR, int);
            $stmt->bindParam(':num_tarjeta', $array['num_tarjeta'], PDO::PARAM_STR, int);
            $stmt->bindParam(':fec_vtarjeta', $array['fec_vtarjeta'], PDO::PARAM_STR, date);
            $stmt->bindParam(':nom_titular', $array['nom_titular'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':edad', $array['edad'], PDO::PARAM_STR , int);
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
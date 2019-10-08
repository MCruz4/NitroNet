<?php
// Incluimos la conexion a la base de datos
include_once 'db_conect/db_conect.php';
// Declaramos nuestra clase, la cual extiende de la base de datos.
class TabPedidoModel extends DB{

    // Creamos la funcion para obtener todos los valores
    function getAllData(){   
        // Iniciamos la conexion
        $conn = $this->connect();
        // Preparamos la consulta
        $stmt = $conn->prepare('SELECT * FROM tabla_pedido');
            
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
            $stmt = $conn->prepare('SELECT * FROM tabla_pedido WHERE id_pedido=:id_pedido');     
        // Trataremos de ejecutar
        try{
            // Cargamos los parametros que utilizaremos.
            $stmt->bindParam(':id_pedido', $id, PDO::PARAM_INT, 11);
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
        $stmt = $conn->prepare("INSERT INTO tabla_pedido VALUES (
            NULL , 
            :cliente,
            :tel_cliente,
            :dir_cliente,
            :email_cliente,
            :sucursal,
            :estado,
            :producto,
            :servicio,
            :color,
            :size,
            :cantidad,
            :preciou,
            :fec_pedido,
            :imagen,
            :visible);");
        try{
            // Cargamos los parametros requeridos.
            $stmt->bindParam(':cliente', $array['cliente'], PDO::PARAM_STR, 100);
            $stmt->bindParam(':tel_cliente', $array['tel_cliente'], PDO::PARAM_STR, 45);
            $stmt->bindParam(':dir_cliente', $array['dir_cliente'], PDO::PARAM_STR, 500);
            $stmt->bindParam(':email_cliente', $array['email_cliente'], PDO::PARAM_STR, 100);
            $stmt->bindParam(':sucursal', $array['sucursal'], PDO::PARAM_STR, 45);
            $stmt->bindParam(':estado', $array['estado'], PDO::PARAM_STR, 45);
            $stmt->bindParam(':producto', $array['producto'], PDO::PARAM_STR, 500);
            $stmt->bindParam(':servicio', $array['servicio'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':color', $array['color'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':size', $array['size'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':cantidad', $array['cantidad'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':preciou', $array['preciou'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':fec_pedido', $array['fec_pedido'], PDO::PARAM_STR, time(oid));
            $stmt->bindParam(':imagen', $array['imagen'], PDO::PARAM_STR, 250);
            $stmt->bindParam(':visible', $array['visible'], PDO::PARAM_STR , int);
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
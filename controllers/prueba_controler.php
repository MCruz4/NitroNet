<?php
include_once 'models/prueba_model.php';
class PruebaControler{
    function getAll(){
        $pruebaM = new PruebaModel();
        $obj = array();
        $obj["items"] = array();
        $res = $pruebaM->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id"            => $row['id'],
                    "nombre"        => $row['nombre'],
                    "descripcion"   => $row['descripcion']
                );
                array_push($obj["items"], $item);
            }
            return json_encode($obj);
        }else if(is_null($res)){
            return null;
        }
        else{
            return json_encode(array('message' => 'none'));
        }
    }


    function getById($id){
        $pruebaM = new PruebaModel();
        $obj = array();
        $obj["items"] = array();
        $res = $pruebaM->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id"            => $row['id'],
                    "nombre"        => $row['nombre'],
                    "descripcion"   => $row['descripcion']
                );
                array_push($obj["items"], $item);
            }
            return json_encode($obj);
        }else if(is_null($res)){
            return null;
        }
        else{
            return json_encode(array('message' => 'none'));
        }
    }

    function insertOne($array){
        $pruebaM = new PruebaModel();
        $res = $pruebaM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
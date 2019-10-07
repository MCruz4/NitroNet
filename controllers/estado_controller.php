<?php
include_once 'models/estado_model.php';
class EstadoController{
    function getAll(){
        $estadoM = new EstadoModel();
        $obj = array();
        $obj["items"] = array();
        $res = $estadoM->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_estado"          => $row['id_estado'],
                    "nom_estado"         => $row['nom_estado'],
                    "color_estado"       => $row['color_estado'],
                    "visible_estado"     => $row['visible_estado']
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
       $estadoM = new EstadoModel();
        $obj = array();
        $obj["items"] = array();
        $res = $estadoM ->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_estado"          => $row['id_estado'],
                    "nom_estado"         => $row['nom_estado'],
                    "color_estado"       => $row['color_estado'],
                    "visible_estado"     => $row['visible_estado']
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
        $estadoM = new EstadoModel();
        $res = $estadoM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
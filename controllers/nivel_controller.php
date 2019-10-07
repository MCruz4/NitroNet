<?php
include_once 'models/nivel_model.php';
class NivelController{
    function getAll(){
        $nivelM = new NivelModel();
        $obj = array();
        $obj["items"] = array();
        $res = $nivelM->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_nivel"          => $row['id_nivel'],
                    "nom_nivel"         => $row['nom_nivel'],
                    "desc_nivel"        => $row['desc_nivel'],
                    "visible_nivel"     => $row['visible_nivel']
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
        $nivelM = new NivelModel();
        $obj = array();
        $obj["items"] = array();
        $res = $nivelM->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_nivel"          => $row['id_nivel'],
                    "nom_nivel"         => $row['nom_nivel'],
                    "desc_nivel"        => $row['desc_nivel'],
                    "visible_nivel"     => $row['visible_nivel']
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
       $nivelM = new NivelModel();
        $res = $nivelM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
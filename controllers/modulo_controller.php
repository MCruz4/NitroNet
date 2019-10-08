<?php
include_once 'models/modulo_model.php';
class ModuloController{
    function getAll(){
        $moduloM = new ModuloModel();
        $obj = array();
        $obj["items"] = array();
        $res = $moduloM->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_modulo"          => $row['id_modulo'],
                    "nom_modulo"         => $row['nom_modulo'],
                    "desc_modulo"        => $row['desc_modulo'],
                    "visible_modulo"     => $row['visible_modulo']
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
        $moduloM = new ModuloModel();
        $obj = array();
        $obj["items"] = array();
        $res = $moduloM->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_modulo"          => $row['id_modulo'],
                    "nom_modulo"         => $row['nom_modulo'],
                    "desc_modulo"        => $row['desc_modulo'],
                    "visible_modulo"     => $row['visible_modulo']
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
        $moduloM = new ModuloModel();
        $res = $moduloM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
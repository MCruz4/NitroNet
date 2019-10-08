<?php
include_once 'models/size_model.php';
class SizeController{
    function getAll(){
        $sizeM = new SizeModel();
        $obj = array();
        $obj["items"] = array();
        $res = $sizeM->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_size"          => $row['id_size'],
                    "nom_size"         => $row['nom_size'],
                    "siglas"           => $row['siglas'],
                    "desc_size"        => $row['desc_size'],
                    "coment_size"      => $row['coment_size'],
                    "visible_size"     => $row['visible_size']
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
        $sizeM = new SizeModel();
        $obj = array();
        $obj["items"] = array();
        $res = $sizeM->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_size"          => $row['id_size'],
                    "nom_size"         => $row['nom_size'],
                    "siglas"           => $row['siglas'],
                    "desc_size"        => $row['desc_size'],
                    "coment_size"      => $row['coment_size'],
                    "visible_size"     => $row['visible_size']
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
        $sizeM = new SizeModel();
        $res = $sizeM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
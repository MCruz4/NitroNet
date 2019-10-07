<?php
include_once 'models/color_model.php';
class ColorController{
    function getAll(){
        $colorM = new ColorModel();
        $obj = array();
        $obj["items"] = array();
        $res = $colorM ->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_color"              => $row['id_color'],
                    "nom_color"             => $row['nom_color'],
                    "imagen_color"          => $row['imagen_color'],
                    "visible_presentacion"  => $row['visible_presentacion']
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
        $colorM = new ColorModel();
        $obj = array();
        $obj["items"] = array();
        $res = $colorM->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_color"              => $row['id_color'],
                    "nom_color"             => $row['nom_color'],
                    "imagen_color"          => $row['imagen_color'],
                    "visible_presentacion"  => $row['visible_presentacion']
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
       $colorM = new ColorModel();
        $res =  $colorM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
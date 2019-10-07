<?php
include_once 'models/cat_sticker_model.php';
class Cat_stickerController{
    function getAll(){
        $cat_stickerM = new Cat_stickerModel();
        $obj = array();
        $obj["items"] = array();
        $res = $cat_stickerM->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_cat_sticker"          => $row['id_cat_sticker'],
                    "nom_cat_sticker"         => $row['nom_cat_sticker'],
                    "desc_cat_sticker"        => $row['desc_cat_sticker'],
                    "fec_mod_cat_sticker"     => $row['fec_mod_cat_sticker'],
                    "visible_cat_sticker"     => $row['visible_cat_sticker']
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
        $cat_stickerM = new Cat_stickerModel();
        $obj = array();
        $obj["items"] = array();
        $res = $cat_stickerM->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_cat_sticker"          => $row['id_cat_sticker'],
                    "nom_cat_sticker"         => $row['nom_cat_sticker'],
                    "desc_cat_sticker"        => $row['desc_cat_sticker'],
                    "fec_mod_cat_sticker"     => $row['fec_mod_cat_sticker'],
                    "visible_cat_sticker"     => $row['visible_cat_sticker']
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
        $cat_stickerM = new Cat_stickerModel();
        $res =  $cat_stickerM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
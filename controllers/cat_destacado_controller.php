<?php
include_once 'models/cat_destacado_model.php';
class Cat_destacadoController{
    function getAll(){
        $cat_destaM = new Cat_destacadoModel();
        $obj = array();
        $obj["items"] = array();
        $res = $cat_destaM->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_cat_destacado"          => $row['id_cat_destacado'],
                    "nom_cat_destacado"         => $row['nom_cat_destacado'],
                    "desc_cat_destacado"        => $row['desc_cat_destacado'],
                    "fec_mod_cat_destacado"     => $row['fec_mod_cat_destacado'],
                    "visible_cat_destacado"     => $row['visible_cat_destacado']
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
        $cat_destaM = new Cat_destacadoModel();
        $obj = array();
        $obj["items"] = array();
        $res = $cat_destaM->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_cat_destacado"          => $row['id_cat_destacado'],
                    "nom_cat_destacado"         => $row['nom_cat_destacado'],
                    "desc_cat_destacado"        => $row['desc_cat_destacado'],
                    "fec_mod_cat_destacado"     => $row['fec_mod_cat_destacado'],
                    "visible_cat_destacado"     => $row['visible_cat_destacado']
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
         $cat_destaM = new Cat_destacadoModel();
        $res =  $cat_destaM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
<?php
include_once 'models/sucursal_model.php';
class SucursalController{
    function getAll(){
        $sucursalM = new SucursalModel();
        $obj = array();
        $obj["items"] = array();
        $res =  $sucursalM->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_sucursal"          => $row['id_sucursal'],
                    "nom_sucursal"         => $row['nom_sucursal'],
                    "dir_sucursal"         => $row['dir_sucursal'],
                    "tel1_sucursal"        => $row['tel1_sucursal'],
                    "tel2_sucursal"        => $row['tel2_sucursal'],
                    "correo_sucursal"      => $row['correo_sucursal'],
                    "fec_mod_sucursal"     => $row['fec_mod_sucursal'],
                    "visible_sucursal"     => $row['visible_sucursal']
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
        $sucursalM = new SucursalModel();
        $obj = array();
        $obj["items"] = array();
        $res = $sucursalM->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                   "id_sucursal"          => $row['id_sucursal'],
                    "nom_sucursal"         => $row['nom_sucursal'],
                    "dir_sucursal"         => $row['dir_sucursal'],
                    "tel1_sucursal"        => $row['tel1_sucursal'],
                    "tel2_sucursal"        => $row['tel2_sucursal'],
                    "correo_sucursal"      => $row['correo_sucursal'],
                    "fec_mod_sucursal"     => $row['fec_mod_sucursal'],
                    "visible_sucursal"     => $row['visible_sucursal']
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
       $sucursalM = new SucursalModel();
        $res = $sucursalM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
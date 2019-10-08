<?php
include_once 'models/servicio_model.php';
class SercivioController{
    function getAll(){
        $servicioM = new ServicioModel();
        $obj = array();
        $obj["items"] = array();
        $res = $servicioM->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_servicio"          => $row['id_servicio'],
                    "nom_servicio"         => $row['nom_servicio'],
                    "desc_servicio"        => $row['desc_servicio'],
                    "coment_servicio"      => $row['coment_servicio'],
                    "revision"             => $row['revision'],
                    "visible_servicio"     => $row['visible_servicio']
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
        $servicioM = new ServicioModel();
        $obj = array();
        $obj["items"] = array();
        $res = $servicioM->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                   "id_servicio"           => $row['id_servicio'],
                    "nom_servicio"         => $row['nom_servicio'],
                    "desc_servicio"        => $row['desc_servicio'],
                    "coment_servicio"      => $row['coment_servicio'],
                    "revision"             => $row['revision'],
                    "visible_servicio"     => $row['visible_servicio']
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
       $servicioM = new ServicioModel();
        $res = $servicioM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
<?php
include_once 'models/Cliente_Model.php';
class ClienteController{
    function getAll(){
        $clienteC = new ClienteModel();
        $obj = array();
        $obj["items"] = array();
        $res = $clienteC ->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_cliente"              => $row['id_cliente'],
                    "nom_cliente"             => $row['nom_cliente'],
                    "ape_cliente"             => $row['ape_cliente'],
                    "dire_cliente"            => $row['dire_cliente'],
                    "tele_cliente"            => $row['tele_cliente']
                    "dui_cliente"             => $row['dui_cliente'],
                    "num_tarjeta"             => $row['num_tarjeta'],
                    "fec_vtarjeta"            => $row['fec_vtarjeta'],
                    "nom_titular"             => $row['nom_titular'],
                    "edad"                    => $row['edad']

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
        $clienteC = new ClienteModel();
        $obj = array();
        $obj["items"] = array();
        $res = $clienteC->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                   "id_cliente"              => $row['id_cliente'],
                    "nom_cliente"             => $row['nom_cliente'],
                    "ape_cliente"             => $row['ape_cliente'],
                    "dire_cliente"            => $row['dire_cliente'],
                    "tele_cliente"            => $row['tele_cliente']
                    "dui_cliente"             => $row['dui_cliente'],
                    "num_tarjeta"             => $row['num_tarjeta'],
                    "fec_vtarjeta"            => $row['fec_vtarjeta'],
                    "nom_titular"             => $row['nom_titular'],
                    "edad"                    => $row['edad']
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
       $clienteC = new ClienteModel();
        $res =  $clienteC->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
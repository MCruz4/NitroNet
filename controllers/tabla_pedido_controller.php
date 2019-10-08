<?php
include_once 'models/tabla_pedido_model.php';
class TabPedidoController{
    function getAll(){
        $tabpedidoM = new TabPedidoModel();
        $obj = array();
        $obj["items"] = array();
        $res = $tabpedidoM->getAllData();
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_pedido"          => $row['id_pedido'],
                    "cliente"            => $row['cliente'],
                    "tel_cliente"        => $row['tel_cliente'],
                    "dir_cliente"        => $row['dir_cliente'],
                    "email_cliente"      => $row['email_cliente'],
                    "sucursal"           => $row['sucursal'],
                    "estado"             => $row['estado'],
                    "producto"           => $row['producto'],
                    "servicio"           => $row['servicio'],
                    "color"              => $row['color'],
                    "size"               => $row['size'],
                    "cantidad"           => $row['cantidad'],
                    "preciou"            => $row['preciou'],
                    "fec_pedido"         => $row['fec_pedido'],
                    "imagen"             => $row['imagen'],
                    "visible"            => $row['visible']
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
        $tabpedidoM = new TabPedidoModel();
        $obj = array();
        $obj["items"] = array();
        $res =  $tabpedidoM->getByIdData($id);
        if($res && $res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id_pedido"          => $row['id_pedido'],
                    "cliente"            => $row['cliente'],
                    "tel_cliente"        => $row['tel_cliente'],
                    "dir_cliente"        => $row['dir_cliente'],
                    "email_cliente"      => $row['email_cliente'],
                    "sucursal"           => $row['sucursal'],
                    "estado"             => $row['estado'],
                    "producto"           => $row['producto'],
                    "servicio"           => $row['servicio'],
                    "color"              => $row['color'],
                    "size"               => $row['size'],
                    "cantidad"           => $row['cantidad'],
                    "preciou"            => $row['preciou'],
                    "fec_pedido"         => $row['fec_pedido'],
                    "imagen"             => $row['imagen'],
                    "visible"            => $row['visible']
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
       $tabpedidoM = new TabPedidoModel();
        $res = $tabpedidoM->insertOneData($array);
        if($res){
            return json_encode(array('message' => 'successful'));
        }else{
            return json_encode(array('message' => 'failed'));
        }
    }
}
?>
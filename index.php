<?php
    
    // config
    // db-conect
    // ver modelo
    // ver controlador
    // llamado en index


////---------- Tabla de Prueba ---------
    //include_once 'controllers/prueba_controler.php';
    //$Prueba = new PruebaControler();
    //echo $Prueba->getById(2);
//----------------------------------------------
    //echo $ar_code=$prueba->getAll();

////---------- Tabla Modulo ---------
   // include_once 'controllers/modulo_controller.php';
    //$Modulo = new ModuloController();
    //echo $Modulo->getById(1);

////---------- Tabla Nivel ---------
   // include_once 'controllers/nivel_controller.php';
   // $Nivel = new NivelController();
   //echo $Nivel->getById(2);

////---------- Tabla cat_sticker ---------
    //include_once 'controllers/cat_sticker_controller.php';
    //$Cat_sticker = new Cat_stickerController();
    //echo $Cat_sticker->getById(1);
    
////---------- Tabla servicio ---------
    //include_once 'controllers/servicio_controller.php';
    //$Servicio = new SercivioController();
    //echo $Servicio->getById(2);

////---------- Tabla cat_destacado ---------
    //include_once 'controllers/cat_destacado_controller.php';
    //$Cat_destacado = new Cat_destacadoController();
    //echo $Cat_destacado->getById(2);

////---------- Tabla size ---------
    //include_once 'controllers/size_controller.php';
    //$Size = new SizeController();
    //echo $Size->getById(1);

////---------- Tabla estado ---------
    //include_once 'controllers/estado_controller.php';
    //$Estado = new EstadoController();
    //echo $Estado->getById(4);

////---------- Tabla pedido ---------
    //include_once 'controllers/tabla_pedido_controller.php';
    //$Ta_pedido = new TabPedidoController();
    //echo $Ta_pedido->getById(1);

////---------- Tabla sucursal ---------
    //include_once 'controllers/sucursal_controller.php';
    //$Sucursal = new SucursalController();
    //echo $Sucursal->getById(1);

////---------- Tabla color ---------
   // include_once 'controllers/color_controller.php';
   // $Color = new ColorController();
    //echo $Color->getById(1);

////---------- Tabla Clientes ---------
    include_once 'controllers/Cliente_Controller.php';
    $Cliente = new ClienteController();
    echo $Cliente->getById(1);

////---------- pagos Clientes ---------
    include_once 'controllers/Pagos_Controller.php';
    $Cliente = new PagosController();
    echo $Cliente->getById(1);
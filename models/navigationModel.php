<?php

class NavigationModel{
    public function defineView($pgCtrl){
        if ($pgCtrl == 'inicio' ||
            $pgCtrl == 'login' ||
            $pgCtrl == 'nosotros' ||
            $pgCtrl == 'servicios' ||
            $pgCtrl == 'paneles' ||
            $pgCtrl == 'registro' ||
            $pgCtrl == 'contactanos'){
        //------
            $pgCtrl .= '.php';
        }else if ($pgCtrl == 'admin'){
           if(isset($_SESSION['userType'])){
               if($_SESSION['userType'] == 1){
                $pgCtrl .= '.php';
               }
           }
        }else{
            $pgCtrl = 'notfound.php';
        }
        
        return $pgCtrl;
    }//Fin de defineView
}//Fin de la clase

?>
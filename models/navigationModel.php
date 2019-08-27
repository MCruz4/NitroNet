<?php

class NavigationModel{
    public function defineView($pgCtrl){
        if ($pgCtrl == 'inicio' ||
            $pgCtrl == 'login' ||
            $pgCtrl == 'nosotros' ||
            $pgCtrl == 'servicios' ||
            $pgCtrl == 'paneles' ||
            $pgCtrl == 'registro'){
        //------
            $pgCtrl .= '.php';
        }else if( $_SESSION['userType'] == 1 &&
            $pgCtrl == 'admin'){
            
        }else{
            $pgCtrl = 'notfound.php';
        }
        
        return $pgCtrl;
    }//Fin de defineView
}//Fin de la clase

?>
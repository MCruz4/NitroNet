<?php
    require 'models/navigationModel.php';
    require 'models/usersModel.php';

class NavigationController{
    

    public function loadView(){
        $navModel = new NavigationModel();
        $toLoad = '';

        if(isset($_GET['onLogin'])){
            if (isset($_POST['user']) && isset($_POST['passwd'])){
                $userModel = new UsersModel();

                if($userModel->login($_POST['user'], $_POST['passwd'] )){
                    header("Location: index.php"); 
                }else{
                    echo '<script>alert("Falló al iniciar sesión, Revise sus credenciales")</script>';
                }
            };
        } //Fin del onLogin()

        if(isset($_GET['onLogout'])){
            unset($_SESSION['user']);
            unset($_SESSION['userID']);
            unset($_SESSION['userType']);
            session_destroy();
            header('Location: index.php');
        } //Fin del onLogin()

        if(isset($_GET['pg'])){
            if($_GET['pg'] == 'admin'){
                $this->loadAdminPanelNavBar();
            }else{
                $this->loadNavBar();
            }
            $toLoad = $navModel->defineView($_GET['pg']);
        }else{
            $toLoad = 'inicio.php';
            $this->loadNavBar();
        }
        include 'views/'.$toLoad;
        
    }//fin de loadView()


    public function loadNavBar(){
        include 'views/modules/navbar.php';

    }//Fin del 
    public function loadAdminPanelNavBar(){
        include 'views/modules/admin/navbar.php';

    }//Fin del navBar
}
?>
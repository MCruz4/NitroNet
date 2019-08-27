<header class="header-section">
    <div class="container">
        <a href="index.html" class="site-logo">
            <img src="img/logo.png" alt="logo">
        </a>
        <!-- Switch button -->
        <div class="nav-switch">
            <div class="ns-bar"></div>
        </div>
        <div class="header-right">
            <ul class="main-menu">
                <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'inicio'){ echo 'class="active"';}} ?>>
                    <a href="index.php">Inicio</a></li>

                <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'nosotros'){ echo 'class="active"';}} ?>>
                    <a href="index.php?pg=nosotros">¿Quienes Somos?</a></li>

                <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'servicios'){ echo 'class="active"';}} ?>>
                    <a href="index.php?pg=servicios">Servicios</a></li>

                <li <?php if(isset($_GET['pg'])){if($_GET['pg'] == 'contactanos'){ echo 'class="active"';}} ?>>
                    <a href="index.php?pg=contactanos">Contactanos</a></li>
            </ul>
            <div class="header-btns">
                <?php if (isset($_SESSION['userType'])){
                    if ($_SESSION['userType'] == 1){ ?>
                        <a href="index.php?pg=admin" class="site-btn sb-c1">Administrar</span></a>
                    <?php }else{ ?>
                        <a href="#" class="site-btn sb-c1">Soporte <span>24/7</span></a>
                    <?php }} //fin de los ifs ?>
                
                <?php if(isset($_SESSION['user'])){ ?>
                <a href="index.php?pg=perfil" class="site-btn sb-c2"><?php echo $_SESSION['user']; ?></a>
                <a href="index.php?onLogout=true" class="site-btn sb-c2">Salir</a>
                <?php }else {?>

                <a href="index.php?pg=login" class="site-btn sb-c2">Ingresar</a>
                <a href="#" class="site-btn sb-c3">Registrarse</a>
                <?php } ?>
            </div>
        </div>
    </div>
</header>
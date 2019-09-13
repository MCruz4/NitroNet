<style>
    button{
        color:white;
        background: transparent;
        border: none !important;
    }
    button:hover{
        cursor:hand;
        color: #fff;
        font-weight: bold;
        text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #ff00de, 0 0 25px #ff00de;
        -webkit-text-fill-color: #F4ECFF;
        -webkit-text-stroke-color:#C546F7;
        -webkit-text-stroke-width:0.2px; 
    }
</style>

<header class="header-section">
    <div class="container">
        <a href="index.php" class="site-logo">
            <img src="img/NitroNet.png" width="70%" alt="logo">
        </a>
        <!-- Switch button -->
        <div class="nav-switch">
            <div class="ns-bar"></div>
        </div>
        <div class="header-right">
            <ul class="main-menu">
                <li> <button onclick="loadModule('resumen')" class="btn_navbar">Resumen</button> </li>
                <li> <button onclick="loadModule('clientes')" class="btn_navbar">Clientes</button> </li>
                <li> <button onclick="loadModule('servicios')" class="btn_navbar">Servicios</button> </li>
                <li> <button onclick="loadModule('')" class="btn_navbar">...</button> </li>
            </ul>
            <div class="header-btns">

                <a href="index.php" class="site-btn sb-c3">Salir del Panel</a>
            </div>
        </div>
    </div>
</header>
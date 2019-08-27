<?php 
    session_start();
    require 'controllers/navigationController.php';
    
    $navController = new NavigationController();
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!--Estilos-->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<!---div id="preloder">
    <div class="loader"></div>
</div--->

    <?php $navController->loadNavbar(); ?>

    <?php $navController->loadView(); ?>



<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/circle-progress.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
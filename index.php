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
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />
</head>

<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase.js"></script>
<script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyAFfyQdO6HasELT3ywjoI1BxWqSqQMYXis",
    authDomain: "nitronet-21f41.firebaseapp.com",
    databaseURL: "https://nitronet-21f41.firebaseio.com",
    projectId: "nitronet-21f41",
    storageBucket: "nitronet-21f41.appspot.com",
    messagingSenderId: "353411586533",
    appId: "1:353411586533:web:b5cf3f32690a8ca2d2b70c"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script>

<body>
<!-- The core Firebase JS SDK is always required and must be listed first -->


    <?php $navController->loadView(); ?>



<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/circle-progress.min.js"></script>
<script src="js/main.js"></script>
<script src="js/firebaseCRUD.js"></script>
</body>
</html>
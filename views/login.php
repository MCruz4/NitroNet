
<head>     
	<title>Iniciar Sesion</title>
</head> 
<style>
body{
margin:0;
padding:0;
font-family:sans-serif;
background:#34495e;

}
.box{
	width: 500px;
	padding: 40px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	background: #191919;
	text-align: center;
}
.box h1{
	color: white;
	text-transform: uppercase;
	font-weight: 500;
}

.box input[type = "text"],.box input[type = "password"]{
	border:0;
	background:none;
	display:block;
	margin: 20px auto;
	text-align:center;
	border: 2px solid #3498db;
	padding: 14px 10px;
	width: 200px;
	outline: none;
	color: white;
	border-radius:24px;
	transition:0.25s;
}

.box input[type = "text"]:focus, .box input[type="password"]:focus{
width: 280px;
border-color:#2ecc71;
}

.box input[type="submit"]{
	border: 0;
	background: none;
	display: block;
	margin: 20px auto;
	text-align: center;
	border: 2px solid #2ecc71;
	padding: 14px 40px;
	width: 200px;
	outline: none;
	color: white;
	border-radius: 24px;
	transition:0.25s;
	cursor: pointer;

}

.box input[type = "submit"]:hover{
	background: #2ecc71;
}

footer{
	color: white;
}

</style>
<div class="hs-item set-bg" data-setbg="img/bg.jpg">
<div class="w-100 p-4"></div>
     <form class="box" action="index.php?onLogin=true" method="post" >
    <h1>Iniciar Sesión</h1>
    <input  type="text" name="user" placeholder="Usuario" required>
    <input  type="password" name="passwd" placeholder="Contraseña" required>
    <input  type="submit" name="" value="Iniciar" onclick="">
    <footer>
       <h6> &copy; Derechos reservados.</h6>  
    </footer>
</form>
 

<script>
	function regUser(){
    var email = document.getElementById("email").value;
    var passwd = document.getElementById("passwd").value;

    if(document.getElementById('policyTerms').checked == false){
        alert("No has aceptado los termino y condiciones de uso");
        return;
    }
    if(email != "" && passwd !=""){
        console.log("Registrando usuario");
            
            firebase.auth().signInWithEmailAndPassword(email, passwd).catch(function(error) {
				alert(error.message);
			});
			var userSession = firebase.auth().currentUser;
			console.log(userSession.email);
			
			
            
            var data = {uid: userSession.uid, uname: name};
            $.post('scripts/onRegister.php', data, function(result){
                console.log("validando inicio de sesion");
                if(result == 1){
                    window.location.href = "index.php";
                }
                
            });

        }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            alert(errorMessage);
            // ...
        });
        
    }else{
        alert("Asegurate de llenar correctamente los campos");
    }
}
</script>
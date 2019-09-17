
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

.box >button{
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

.box > button:hover{
	background: #2ecc71;
}

footer{
	color: white;
}

</style>
<div class="hs-item set-bg" data-setbg="img/bg.jpg">
<div class="w-100 p-4"></div>
     <div class="box" if="loginForm">
    <h1>Iniciar Sesión</h1>
    <input  type="text" name="email" id="email" placeholder="Correo Electronico" required>
    <input  type="password" name="passwd" id="passwd" placeholder="Contraseña" required>
    <button name="login" value="login" onclick="signIn()">Iniciar Sesion</button>
    <footer>
       <h6> &copy; Derechos reservados.</h6>  
    </footer>
</div>
 

<script>
	function signIn(){
    var email = document.getElementById("email").value;
    var passwd = document.getElementById("passwd").value;

    if(email != "" && passwd !=""){
        console.log("consultando al servidor");
		var data;
            
		firebase.auth().signInWithEmailAndPassword(email, passwd).catch(function(error) {
			alert(error.message);
		}).then(function(success){
			var userSession = firebase.auth().currentUser;
			var ref = firebase.database().ref("users");
			ref.orderByChild("uid").equalTo(userSession.uid).on("child_added", function(userD) {
				var udata = JSON.parse(JSON.stringify(userD));
				data = {uid: userSession.uid, uname: udata.name, utype: udata.utype};
				console.log(userSession.email);
				$.post('scripts/onLogin.php', data, function(result){ //
					console.log("Iniciando Sesion");
					if(result == 1){
						window.location.href = "index.php";
					}
				}); //termina $.post()
			}); //Termina el "select"
			
			
			
			

		});// Fin promesa signIn
    }else{
        alert("Asegurate de llenar correctamente los campos");
    }
}

</script>
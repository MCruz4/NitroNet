<!DOCTYPE html> 
<html lang="en"> 
<head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <meta http-equiv="X-UA-Compatible" content="ie=edge">     
    <title>Consulta de Clientes</title>     
    <link rel="stylesheet" href="../css/bootstrap.min.css">     
    <link rel="stylesheet" href="../css/estilo.css"> 
</head> 
<body>     
    <div class="container">     
        
        <section>     
            <article>     
                <div class="row">         
                    <div class="col-md-6 mt-2 border shadow-lg p-5 mb-5">  
                       <div class="card">   
                         <div class="card-header fdo">         
                            ADMINISTRACION CLIENTES   
                         </div>   
                         <div class="card-body">     
                            <h5 class="card-title">Consultar registro de clientes</h5>         
                            <form action="" method="post">             
                                <div class="form-group">             
                                    <label for="buscar">Ingrese palabra a buscar</label>             
                                    <input type="text" name="buscar" class="form-control">             
                                </div>             
                                <input type="submit" name="consultar" class="btn btn-primary" value="Consultar">         
                            </form> 
                         </div> 
                     </div>              
              </div>     
         </div>     
     </article> 
 </section> 
 <section>     
    <article>     
        <div class="row">         
            <div class="col-md-12 mt-2">  
        <div class="card">         
        <div class="card-header fdo">  
        <br>           
        <h1>Registro de los clientes</h1>  
        <br>      
        </div>         
        <div class="card-body">                      
        <?php       
         echo '<table class="table table-striped" border="1" bordercolor="black">';             
            echo '<thead class="thead-primary">';             
            echo '<th>Código</th>';             
            echo '<th>Nombre</th>';             
            echo '<th>Apellido</th>';             
            echo '<th>Dirección</th>';             
            echo '<th>Ciudad</th>';                          
            echo '</thead>';                                                                        
            echo '</table';                    
            ?>
        </div>         
    </div>          
        </div>     
    </div>     
</article> 
</section>     
<?php 

?>     
<script src="../js/jquery-3.3.1.js"></script>     
<script src="../js/bootstrap.min.js"></script> 
</body> 
</html> 
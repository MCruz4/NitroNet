<style>

</style>

<div class="container">     
        
        <section>     
            <article>     
                <div class="row">         
                    <div class="col-md-6 mt-2 shadow-lg  mb-5">  
                       <div class="card">   
                         <div class="card-header fdo">         
                            Buscar Cliente  
                         </div>   
                         <div class="card-body">          
                            <form action="" method="post">             
                                <input type="text" name="buscar" class="form-control col-md-8" style="display: inline-block"> 
                                <input type="submit" name="consultar" class="btn btn-primary col-md-3 ml-3" value="Consultar">                     
                                
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
            <div class="col-md-12">  
        <div class="card">         
        <div class="card-header fdo">  
        <br>           
        <h1>Listado de Clientes</h1>  
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
            echo '<th>Telefono</th>';
            echo '<th>E-Mail</th>'; 
            echo '</thead>';                                                                        
            echo '</table';                    
            ?>
        </div>         
    </div>          
        </div>     
    </div>     
</article> 
</section>     
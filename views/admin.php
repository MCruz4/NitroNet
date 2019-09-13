<head>
    <title>Administracion</title>
    <style> 
    body{ 
        background-image: url("img/bg.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
     </style>
</head>
<div class="w-100 p-4"></div>
<div class="w-100 p-4"></div>
<div class="w-100 p-4"></div>
<div class="w-100 p-4"></div>
<section class="container" id="forLoadModule">


<div class="w-100 p-4"></div>
    <div class="row">
      <div class="col-sm-12 col-md-6 offset-md-2" style="color:white;">
        <h1 class="text-center">Bienvenido a la administracion del Sistema</h1>
      </div>
    </div>

</section>



  <script type="text/javascript">

    window.ready = loadModule('resumen');

    function loadModule(modules){
      $('#forLoadModule').load('views/modules/admin/'+modules+'.php');
    }

  </script>


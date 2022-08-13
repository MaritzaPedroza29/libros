

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <!--<li><a href="#">Soy Participante</a></li>
        <li><a href="#">Soy Expositor</a></li>!-->
      </ul>   
      <ul class="nav navbar-nav navbar-right">
      
        <li><a href="#" onclick="panel_login()">Administrar</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
  <form class="form-horizontal"  method="post" id="datoslogin" autocomplete="off" enctype="multipart/form-data" onsubmit="loged();return false;">
<div class="col-lg-4 col-lg-12">
<div id="MXD"></div>
</div>
<div class="col-lg-4 col-lg-12">

  
 

</div>
<div class="col-lg-4 col-lg-12">

<div class="panel panel-default" style="margin-top:20%;">
    <div class="panel-heading"><h3>login</h3><p>Iniciar Sesión</div>
    <div class="panel-body">
     <div id="mgs"></div>
    

            <div class="form-group" >
              <div id="label-email">
                <label for="email">Documento de Identidad:</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                    <input type="text" class="form-control" name="cuenta" value=""    autofocus placeholder="Documento de identidad">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div id="label-passw">
                <label for="password">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-star"></span></span>
                    <input type="password" class="form-control" name="pasw" value=""    placeholder="Contraseña Documento">
                </div>
              </div>
            </div>
            
            <button type="submit" id="submit" class="btn btn-default" name="boton" ><span class="fa fa-lock"></span> Entrar</button>
            
        
        <p><a href="#" onclick="restore()" class="xs btn-primary" style="margin-top:5%;"> Olvidé mi contraseña? </a></p>
       
        
    </div>
    
</div>
</div>





</div>
    
</form>

</div>
 
</div>




  <script>

  function loged(){
     
  var parametros = new FormData($('#datoslogin')[0]);
  $("#submit").fadeOut();
    $.ajax({
        mimeType: 'text/html; charset=utf-8',
        url: './?c=index&a=verificar',
        method: 'POST',
        async: true,
        data: parametros,
        contentType:false,
        processData:false,
        dataType: 'json',
        success: function(respuesta) {
          //Accion diferente al otro AJAX
         // setTimeout(function() { load() }, 10);   
       
         if(parseInt(respuesta.success)==3){
          $("#submit").fadeIn();
            location.href = './?c=index&a=panel';
          }else{
            mensaje(respuesta.success, respuesta.response,'mgs');
            $("#submit").fadeIn();
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
          dialogo(7,'ERROR');
          $("#submit").fadeIn();
      }
  });
}

function panel_login(){
    
    $.ajax({
        mimeType: 'text/html; charset=utf-8',
        url: './?c=admin',
        method: 'POST',
        async: true,
        data: { },
        dataType: 'html',
        success: function(respuesta) {
          
          $('#Mbody').html(respuesta);
         $('#Mtitle').html('Administrar');
         $('#Modal').modal('show');

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error 404');
        }
    }).done(function(respuesta) {

    });
}

</script>
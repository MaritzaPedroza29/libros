<form class="form-horizontal"  method="post" id="datos"     enctype="multipart/form-data" onsubmit="guardar_persona(this);return false;">
<div class="panel panel-default">
  <div class="panel-body">
  <div id="_MSG_"></div>
     <div class="form-group">
       <label class="col-lg-6">Nombre*</label>                
       <div class="col-lg-12">
         <input type="text"  class="form-control" id="identifi"  name="nombre" value="<?PHP echo $nombre;?>"  placeholder="nombre *" >
       </div>
     </div>

     <div class="form-group">
       <label class="col-lg-6">Editorial*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="inombre"  name="editorial" value="<?PHP echo $editorial;?>"  placeholder="editorial*" >
       </div>
     </div>

     <div class="form-group">
       <label class="col-lg-6">Cantidad*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="iapellido"  name="cantidad" value="<?PHP echo $cantidad;?>"  placeholder="cantidad *" >
       </div>
     </div>   
       <div class="form-group">
         <div class="col-lg-12">
            <button type="submit" id="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>

     </div>      

   </div>
        
</form>

<script>

var parametros;

function guardar_persona(data){
  $('#submit').fadeOut();
  mensaje(4, "Procesando",'_MSG_');
  parametros = new FormData(data);
  //console.log(parametros);/*
    $.ajax({
        mimeType: 'text/html; charset=utf-8',
        url: './?c=persona&a=guardar',
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

            $('#Modal').modal('hide');
            $("#Mbody").html('');
            $('#Mtitle').html('');
            dialogo(respuesta.success, respuesta.response);
            setTimeout(function() { location.href = respuesta.vista;}, 1000);
          }else{

          $('#submit').fadeIn();
          mensaje(respuesta.success, respuesta.response,'_MSG_');
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
          dialogo(7,'ERROR');
          $('#submit').fadeIn();
      }
  });
}
</script>
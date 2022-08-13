<form class="form-horizontal"  method="post" id="datos"     enctype="multipart/form-data" onsubmit="guardar_persona();return false;">
<div class="panel panel-default">
  <div class="panel-body">
  <div id="MSG"></div>
  <input type="hidden" class="form-control" id="idd"  name="idd" value="<?PHP echo $idd;?>"  >
     <div class="form-group">
       <label class="col-lg-6">Nombre*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="nombre"  name="nombre" value="<?PHP echo $nombre;?>"  placeholder="nombre *" >
       </div>
     </div>

     <div class="form-group">
       <label class="col-lg-6">Editorial*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="editorial"  name="editorial" value="<?PHP echo $edit;?>"  placeholder="Editorial *" >
       </div>
     </div>   

     <div class="form-group">
       <label class="col-lg-6">Cantidad*</label>                
       <div class="col-lg-12">
         <input type="number" class="form-control" id="cantidad"  name="cantidad" value="<?PHP echo $can;?>"  >
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
function guardar_persona(){
  $('#submit').fadeOut();
  mensaje(4, "Procesando",'MSG');
  var parametros = new FormData($('#datos')[0]);

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
          mensaje(respuesta.success, respuesta.response,'MSG');
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
          dialogo(7,'ERROR');
          $('#submit').fadeIn();
      }
  });
}

function vereficar(id) {
  $.ajax( {
    type: "POST",
    data: "id="+id,
    url: './?c=persona&a=vereficar',
    dataType: "json",
    cache: false,
    success: function(data) {
      document.getElementById("nombre").value = data["Nombre"];
      document.getElementById("editorial").value = data["Editorial"];
      document.getElementById("cantidad").value = data["Cantidad"];
      document.getElementById("idd").value = data["Id_libro"];
    }
  });
}
</script>
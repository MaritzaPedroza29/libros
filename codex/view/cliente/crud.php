<form class="form-horizontal"  method="post" id="datos"     enctype="multipart/form-data" onsubmit="guardar_persona();return false;">
<div class="panel panel-default">
  <div class="panel-body">
  <div id="MSG"></div>
  <input type="hidden" class="form-control" id="idd"  name="idd" value="<?PHP echo $idd;?>"  >
  <div class="form-group">
       <label class="col-lg-6">Cedula*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="cedula"  name="cedula" value="<?PHP echo $ced;?>"  placeholder="cedula *" >
       </div>
     </div>
     <div class="form-group">
       <label class="col-lg-6">Nombre*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="nombre"  name="nombre" value="<?PHP echo $nombre;?>"  placeholder="nombre *" >
       </div>
     </div>

     <div class="form-group">
       <label class="col-lg-6">Apellido*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="apellido"  name="apellido" value="<?PHP echo $ape;?>"  placeholder="Editorial *" >
       </div>
     </div>   

     <div class="form-group">
       <label class="col-lg-6">Nombre libro*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="nom_libro"  name="nom_libro" value="<?PHP echo $nom_libro;?>"  >
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
        url: './?c=cliente&a=guardar',
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
    url: './?c=cliente&a=vereficar',
    dataType: "json",
    cache: false,
    success: function(data) {
      document.getElementById("nombre").value = data["Nombre"];
      document.getElementById("apellido").value = data["Apellido"];
      document.getElementById("nom_libro").value = data["Nom_libro"];
      document.getElementById("idd").value = data["cedula"];
    }
  });
}
</script>
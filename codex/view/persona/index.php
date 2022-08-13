<div class="container">
    <legend>Libros</legend>
    <a href="#" onclick="Nuevo()"  class="btn btn-primary btn-xs">Nuevo</a>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
    <th>#</th>
      <th>Nombre</th>
      <th>Editorial</th>
      <th>Cantidad</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
      <?PHP
        while($obj=$this->model->recorrer($rs)):  
      ?>
    <tr>
    <td><a onclick="<?PHP echo 'editar('.$obj['Id_libro'].')';?>" ><?PHP echo $obj['Id_libro'];?></td>
      <td><?PHP echo $obj['Nombre'];?></td>
      <td><?PHP echo $obj['Editorial'];?></td>
      <td><?PHP echo $obj['Cantidad'];?></td>
     <td>
     <a class="btn btn-danger " onclick="eliminar();" role="button"><span class="glyphicon glyphicon-trash"></span></a><td>
    </tr>
    <?PHP
    endwhile;
    ?>
    </tbody>
</table> 

</div>


<script>
function  Nuevo() {
  $.ajax({
        mimeType: 'text/html; charset=utf-8',
        url: './?c=persona&a=crud',
        method: 'POST',
        async: true,
        data: { },
        dataType: 'html',
        success: function(respuesta) {
        //Accion diferente al otro AJAX
        //$('#longimodal').removeClass('modal-dialog');// se remueve por si se quiere hacer mas grande
        //$('#longimodal').addClass('modal-dialog-lg');// esta es la clase para hacerla a tope de pantalla
        $('#Mbody').html(respuesta);
        $('#Mtitle').html('Nuevo libro');
        $('#Modal').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
        alert('Error 404');
        }
    })
}


function editar(id){
  $.ajax({
        mimeType: 'text/html; charset=utf-8',
        url: './?c=persona&a=crud',
        method: 'POST',
        async: true,
        data: {vid:id},
        dataType: 'html',
        success: function(respuesta) {
        //Accion diferente al otro AJAX
        //$('#longimodal').removeClass('modal-dialog');// se remueve por si se quiere hacer mas grande
        //$('#longimodal').addClass('modal-dialog-lg');// esta es la clase para hacerla a tope de pantalla
        $('#Mbody').html(respuesta);
        $('#Mtitle').html('Editar libro');
        $('#Modal').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
        alert('Error 404');
        }
    })
}

function eliminar(id){
  $.ajax({
        mimeType: 'text/html; charset=utf-8',
        url: './?c=persona&a=eliminar',
        method: 'POST',
        async: true,
        data: 'id='+id,
        dataType: 'html',
        success: function(respuesta) {
        //Accion diferente al otro AJAX
        //$('#longimodal').removeClass('modal-dialog');// se remueve por si se quiere hacer mas grande
        //$('#longimodal').addClass('modal-dialog-lg');// esta es la clase para hacerla a tope de pantalla
        $('#Mbody').html(respuesta);
        $('#Mtitle').html('Editar libro');
        $('#Modal').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
        alert('Error 404');
        }
    })
}
</script>
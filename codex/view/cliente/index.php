<div class="container">
    <legend>Clientes</legend>
    <a href="#" onclick="Nuevo()"  class="btn btn-primary btn-xs">Nuevo</a>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
    <th>#</th>
     <th>Nombre</th>
      <th>Apeliido</th>
      <th>Nombre del libro</th>
    </tr>
  </thead>
  <tbody>
      <?PHP
        while($obj=$this->model->recorrer($rs)):  
      ?>
    <tr>
    <td><a onclick="<?PHP echo 'editar('.$obj['cedula'].')';?>" ><?PHP echo $obj['cedula'];?></td>
      <td><?PHP echo $obj['Nombre'];?></td>
      <td><?PHP echo $obj['Apellido'];?></td>
      <td><?PHP echo $obj['Nom_libro'];?></td>
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
        url: './?c=cliente&a=crud',
        method: 'POST',
        async: true,
        data: { },
        dataType: 'html',
        success: function(respuesta) {
        //Accion diferente al otro AJAX
        //$('#longimodal').removeClass('modal-dialog');// se remueve por si se quiere hacer mas grande
        //$('#longimodal').addClass('modal-dialog-lg');// esta es la clase para hacerla a tope de pantalla
        $('#Mbody').html(respuesta);
        $('#Mtitle').html('Nuevo cliente');
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
        url: './?c=cliente&a=crud',
        method: 'POST',
        async: true,
        data: {vid:id},
        dataType: 'html',
        success: function(respuesta) {
        //Accion diferente al otro AJAX
        //$('#longimodal').removeClass('modal-dialog');// se remueve por si se quiere hacer mas grande
        //$('#longimodal').addClass('modal-dialog-lg');// esta es la clase para hacerla a tope de pantalla
        $('#Mbody').html(respuesta);
        $('#Mtitle').html('Editar cliente');
        $('#Modal').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
        alert('Error 404');
        }
    })
}
</script>
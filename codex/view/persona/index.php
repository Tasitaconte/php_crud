<div class="container">
    <legend>Personas</legend>
    <a href="#" onclick="Nuevo()"  class="btn btn-primary btn-xs">Nuevo</a>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
    <th>#</th>
      <th>Identificación</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Fecha</th>
    </tr>
  </thead>
  <tbody>
      <?PHP
        while($obj=$this->model->recorrer($rs)):  
      ?>
    <tr>
    <td><a onclick="<?PHP echo 'editar('.$obj['persona_id'].')';?>" ><?PHP echo $obj['persona_id'];?></td>
      <td><?PHP echo $obj['persona_identificacion'];?></td>
      <td><?PHP echo $obj['persona_nombre'];?></td>
      <td><?PHP echo $obj['persona_apellido'];?></td>
      <td><?PHP echo $obj['persona_fecha'];?></td>
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
        $('#Mtitle').html('Nueva Persona');
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
        $('#Mtitle').html('Editar Persona');
        $('#Modal').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
        alert('Error 404');
        }
    })
}
</script>
<form class="form-horizontal"  method="post" id="datos"     enctype="multipart/form-data" onsubmit="guardar_persona();return false;">
igual
  <div class="panel panel-default">
    
  <div class="panel-body">
  <div id="_MSG_"></div>
  <div class="form-group">
      <label for="select" class="col-lg-6 control-label">Tipo documento</label>
      <div class="col-lg-10">
        <select class="form-control" name="tp">
          <option>Seleccione</option>
          <?PHP
            while($obj=$this->model->recorrer($rs)): 
                $ck='';
                if($tp==$obj['tip_id']){
                $ck='selected';
                } 
          ?>
            <option <?PHP echo $ck;?> value="<?PHP echo $obj['tip_id'];?>"><?PHP echo $obj['tip_nombre'];?></option>

            <?PHP
            endwhile;
            ?>
        
        </select>
      </div>
    </div>

     <div class="form-group">
       <label class="col-lg-6">Identificación*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="inombres"  name="identificacion" value="<?PHP echo $identificacion;?>"  placeholder="Nombres *" >
       </div>
     </div>

     <div class="form-group">
       <label class="col-lg-6">Nombre*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="iapellidos"  name="nombre" value="<?PHP echo $nombre;?>"  placeholder="nombre *" >
       </div>
     </div>

     <div class="form-group">
       <label class="col-lg-6">Apellido*</label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" id="iemail"  name="apellido" value="<?PHP echo $apellido;?>"  placeholder="Apellido *" >
       </div>
     </div>   

     <div class="form-group">
       <label class="col-lg-6">Fecha*</label>                
       <div class="col-lg-12">
         <input type="date" class="form-control" id="itelefono"  name="fecha" value="<?PHP echo $fecha;?>"  >
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
  mensaje(4, "Procesando",'_MSG_');
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
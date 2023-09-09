<form class="form-horizontal" autocomplete="off"  method="post" id="datosadmin"     enctype="multipart/form-data" onsubmit="login_admin();return false;">
<div id="mgsloginAdm"></div>
<div class="panel panel-default">
  <div class="panel-body">
  <div id="mgs"></div>
     <div class="form-group">
       <label class="col-lg-2"></label>                
       <div class="col-lg-12">
         <input type="text" class="form-control" name="cuenta" id="iemail"  value=""  placeholder="E-mail" >
       </div>
     </div>

    <div class="form-group">
     <label class="col-lg-2"></label>                
       <div class="col-lg-12">
         <input type="password" class="form-control" name="pasw" value="" placeholder="Contraseña" autofocus>
       </div>
       </div>
       <div class="form-group">
         <div class="col-lg-12">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>
          </div>
        </div>

            <div class="form-group" style="text-align:center;margin-top:2%;">           
            <a onclick="restore()">Olvidaste  tu contraseña?</a>            
            </div>

            </div>
        </div>
</form>

<script>
  $( window ).load(function() {
    $('#iemail').focus();
});
 

function login_admin(){
 
  var parametros = new FormData($('#datosadmin')[0]);
  
    $.ajax({
        mimeType: 'text/html; charset=utf-8',
        url: './?c=admin&a=verificar',
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
            $('#Mbody').html('');
              location.href = (respuesta.vista);
          }else{
            mensaje(respuesta.success, respuesta.response,'mgs');
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
          dialogo(7,'ERROR');
      }
  });
}

function restore(){
        $.ajax({
       mimeType: 'text/html; charset=utf-8',
       url: './?c=admin&a=restore',
       method: 'POST',
       async: true,
       data: {  },
       dataType: 'html',
       success: function(respuesta) {
       //Accion diferente al otro AJAX
       
       
       $('#Mbody').html(respuesta);
        $('#Mtitle').html('Recuperar Clave');
          $('#Modal').modal('show');
                
        },
        error: function(jqXHR, textStatus, errorThrown) {
         alert('Error 404');
       }
      }).done(function(respuesta) {
     });
      }
</script>
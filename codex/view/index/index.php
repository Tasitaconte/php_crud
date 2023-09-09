<div class="container mt-5 d-flex justify-content-center">
  <form method=" post" id="datoslogin" autocomplete="off" enctype="multipart/form-data"
    onsubmit="loged();return false;">
    <div class=" card shadow rounded-0 p-1 " style=" width: 18rem;">
      <div class="card-body">
        <h5 class=" text-center card-title">LOGIN</h5>
        <div class="mb-3">
          <label for="Email" class="form-label">Email address</label>
          <input type="Email" name="Email" class="rounded-0  form-control" id="Email" placeholder="name@example.com"
            required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="rounded-0 form-control" id="password"></input>
        </div>
      </div>
      <button type="submit" id="submit" class="rounded-0 btn btn-success" name="boton"><span class="fa fa-lock"></span>
        Entrar</button>
      <button type="button" id="submit" data-bs-toggle="modal" data-bs-target="#exampleModal"
        class="mt-2 rounded-0 btn btn-primary" name="boton"><span class="fa fa-lock"></span>
        Registrarse</button>
    </div>
  </form>

</div>


<script>

  function loged() {

    var parametros = new FormData($('#datoslogin')[0]);
    $.ajax({
      mimeType: 'text/html; charset=utf-8',
      url: './?c=index&a=verificar',
      method: 'POST',
      async: true,
      data: parametros,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function (respuesta) {
        if (parseInt(respuesta.success) == 3) {
          location.href = './?c=paciente&a=index';
        } else {
          dialogo(7, respuesta.response);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        dialogo(7, 'ERROR');
      }
    });
  }

</script>
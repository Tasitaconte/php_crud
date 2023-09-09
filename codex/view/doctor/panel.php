<div class="container">
  <table class="table border shadow mt-2">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Edad</th>
        <th scope="col">Genero</th>
        <th scope="col">Telefono</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($obj = $this->model->recorrer($rs)): ?>
        <tr>
          <td>
            <?PHP echo $obj['Nombre']; ?>
          </td>
          <td>
            <?PHP echo $obj['Edad']; ?>
          </td>
          <td>
            <?PHP echo $obj['Genero']; ?>
          </td>
          <td>
            <?PHP echo $obj['Telefono']; ?>
          </td>
          <td>
            <a href="#CrearHistorial" class="btn btn-primary"
              onclick="<?PHP echo 'crearHistoria(' . $obj['PacienteID'] . ')'; ?>">Crear historial</a>
          </td>
        </tr>
        <?PHP
      endwhile;
      ?>
    </tbody>
  </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 justify-content-center" id="exampleModalLabel">REGISTRO</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="datos">
          <div id="alertMSG"></div>
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" class="form-control" id="edad" name="edad" required>
          </div>
          <div class="form-group">
            <label for="genero">Género:</label>
            <select class="form-control" id="genero" name="genero" required>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <div class="form-group">
            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
          </div>
          <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
          </div>
          <div class="form-group">
            <label for="Email">Email:</label>
            <input type="email" class="form-control" id="Email" name="Email" required>
          </div>
          <div class="form-group">
            <label for="Password">Password:</label>
            <input type="password" class="form-control" id="Password" name="Password" required>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" onclick="guardar()" class="rounded-0 btn btn-primary">Registrarse</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function crearHistoria(id) {
    $.ajax({
      mimeType: 'text/html; charset=utf-8',
      url: './?c=paciente&a=crud',
      method: 'POST',
      async: true,
      data: { vid: id },
      dataType: 'json',
      success: function (respuesta) {
        console.log(respuesta);
        if (respuesta.success === 3) {
          location.href = './?c=paciente&a=crearHistorial';
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert('Error 404');
      }
    })
  }



  function guardar() {
    var parametros = new FormData($('#datos')[0]);
    $.ajax({
      mimeType: 'text/html; charset=utf-8',
      url: './?c=paciente&a=guardar',
      method: 'POST',
      async: true,
      data: parametros,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function (respuesta) {
        if (parseInt(respuesta.success) == 3) {
          $("#exampleModal").modal('hide');
          $('.table').load(location.href + " .table")
          dialogo(respuesta.success, respuesta.response);
          return;
        }
        console.log(respuesta);
        $("#alertMSG").html(alertMSG(respuesta.response));
        return;
      },
      error: function (jqXHR, textStatus, errorThrown) {
        dialogo(7, 'ERROR');
        return;
      }
    });
  }

  function alertMSG(mensaje) {
    return `
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Hubo un error</strong> ${mensaje}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    `
  }

</script>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">HISTORIAL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./?c=paciente&a=index">inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
            class="mt-2 rounded-0 btn btn-primary">CrearPaciente</a>
        </li>
      </ul>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <strong>Hola!</strong>
          <?PHP echo $_SESSION['NOM']; ?><span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./?c=logout">Salir</a></li>
        </ul>
      </div>

    </div>
  </div>
</nav>
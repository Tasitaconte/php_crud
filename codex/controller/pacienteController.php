<?PHP

require_once('./codex/model/class.paciente.php');

class PacienteController
{
    private $model, $validacion;

    public function __CONSTRUCT()
    {
        $this->model = new Paciente();
        $this->validacion = new Validacion;
    }

    public function index()
    {
        require_once('codex/layout/head.php');
        if (!$this->validacion->estaconectado('ROL', 1)) {
            print $this->validacion->offline();
            exit;
        }
        $rs = $this->model->consultar("paciente");
        require_once('codex/layout/nav/nav.php');
        require_once('codex/view/doctor/panel.php');
        require_once('codex/layout/footer.php');
    }

    function crud()
    {
        if ($this->validacion->estaconectado('ROL', 1)) {
            if (isset($_POST['vid'])) {
                $rp = $this->model->consultar('paciente', " where PacienteID=" . $_POST['vid']);
                if ($this->model->rows($rp) == 1) {
                    $_SESSION['paciente'] = $_POST['vid'];
                    return $this->validacion->mensaje(3, 'aqui conectado');
                }
            }
            return $this->validacion->mensaje(1, 'ERROR');
        }
    }

    function crearHistorial()
    {
        require_once('codex/layout/head.php');
        if (!$this->validacion->estaconectado('ROL', 1)) {
            print $this->validacion->offline();
            exit;
        }
        $rs = $this->model->consultar('paciente', " where PacienteID=" . $_SESSION['paciente']);
        require_once('codex/layout/nav/nav.php');
        require_once('codex/view/doctor/historial.php');
        require_once('codex/layout/footer.php');
        return;
    }

    function guardarHistorial()
    {
        if ($this->validacion->estaconectado('ROL', 1)) {
            if (
                !isset($_POST['antecedentes']) || $_POST['antecedentes'] == ''
                || !isset($_POST['alergias']) || $_POST['alergias'] == ''
                || !isset($_POST['medicamentos']) || $_POST['medicamentos'] == ''
                || !isset($_POST['procedimientos']) || $_POST['procedimientos'] == ''
                || !isset($_POST['enfermedades']) || $_POST['enfermedades'] == ''
                || !isset($_POST['vacunas']) || $_POST['vacunas'] == ''
                || !isset($_POST['notas']) || $_POST['notas'] == ''
            ) {
                return $this->validacion->mensaje(0, 'Datos con *  requeridos');
            }
            $ok = $this->model->historial(
                $_SESSION['paciente'],
                $_POST['antecedentes'],
                $_POST['alergias'],
                $_POST['medicamentos'],
                $_POST['procedimientos'],
                $_POST['enfermedades'], $_POST['vacunas'], $_POST['notas']
            );
            if ($ok > 0) {
                return $this->validacion->mensaje(3, 'Historial Creado Correctamente');
            }
            return $this->validacion->mensaje(1, 'Error de registro');
        }
    }

    function guardar()
    {
        if ($this->validacion->estaconectado('ROL', 1)) {
            if (
                !isset($_POST['nombre']) || $_POST['nombre'] == ''
                || !isset($_POST['edad']) || $_POST['edad'] == ''
                || !isset($_POST['genero']) || $_POST['genero'] == ''
                || !isset($_POST['fechaNacimiento']) || $_POST['fechaNacimiento'] == ''
                || !isset($_POST['direccion']) || $_POST['direccion'] == ''
                || !isset($_POST['telefono']) || $_POST['telefono'] == ''
                || !isset($_POST['Password']) || $_POST['Password'] == ''
                || !isset($_POST['Email']) || $_POST['Email'] == ''
            ) {
                return $this->validacion->mensaje(0, 'Datos con *  requeridos');
            }
            $ok = $this->model->registrar(
                $_POST['nombre'],
                intval($_POST['edad']),
                $_POST['genero'],
                date("Y-m-d", strtotime($_POST['fechaNacimiento'])),
                $_POST['direccion'], $_POST['telefono'], $_POST['Password'], $_POST['Email'],
            );
            if ($ok > 0) {
                return $this->validacion->mensaje(3, 'Si registro');
            }
            return $this->validacion->mensaje(1, 'Error de registro');
        }
    }

}
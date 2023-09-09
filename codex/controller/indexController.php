<?PHP

require_once('./codex/model/class.usuario.php');

class IndexController
{

    private $model, $validacion;

    public function __CONSTRUCT()
    {
        $this->model = new Usuario();
        $this->validacion = new Validacion;
    }

    public function index()
    {
        require_once('codex/layout/head.php');
        require_once('codex/view/index/index.php');
        require_once('codex/layout/footer.php');
    }

    public function about()
    {
        require_once('codex/layout/head.php');
        require_once('codex/layout/nav/nav.php');
        require_once('codex/view/index/about.php');
        require_once('codex/layout/footer.php');
    }


    public function verificar()
    {
        if (isset($_POST['Email']) && isset($_POST['password'])) {
            $_POST['Email'] = $this->validacion->limpiar($_POST['Email']);
            $_POST['password'] = $this->validacion->limpiar($_POST['password']);
            $_POST['password'] = MD5($_POST['password']);
            $rst = $this->model->consultar('usuario', " where usuario_email='" . $_POST['Email'] . "' and usuario_pasw='" . $_POST['password'] . "'");
            $nrs = $this->model->rows($rst);
            if ($nrs != 1) {
                return $this->validacion->mensaje(1, 'credenciales incorrectas');
            }
            $dat = $this->model->recorrer($rst);
            $_SESSION['time'] = time();
            $TK = md5(date('Y-m-d H:i:s'));
            $_SESSION['expire'] = $_SESSION['time'] + (3600 * 4600 * 5600 * 6600);
            $_SESSION['TK'] = $TK;
            $_SESSION[$TK] = MD5($dat['usuario_id'] . $dat['usuario_nombre']);
            $_SESSION['ID'] = $dat['usuario_id'];
            $_SESSION['NOM'] = $dat['usuario_nombre'];
            $_SESSION['ROL'] = 1; //paciente

            return $this->validacion->mensaje(3, 'conectado');
        }
    }

    public function panel()
    {
        if (!$this->validacion->estaconectado('ROL', 1)) {
            print $this->validacion->offline();
        }
        require_once('codex/layout/head.php');
        require_once('codex/layout/nav/nav.php');
        require_once('codex/view/doctor/panel.php');
        require_once('codex/layout/footer.php');
    }
}
?>
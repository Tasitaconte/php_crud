<?PHP


class AboutController{
        
    private $model,$validacion;

    public function __CONSTRUCT(){
       
        $this->validacion = new Validacion;       
    }

    public function index(){
        require_once('codex/layout/head.php');
        require_once('codex/layout/nav/nav.php'); 
        require_once('codex/view/admin/about.php');
        require_once('codex/layout/footer.php'); 
        
    }
}
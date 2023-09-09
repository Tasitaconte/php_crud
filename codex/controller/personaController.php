<?PHP

require_once('./codex/model/class.persona.php');

class PersonaController{
        
    private $model,$validacion;

    public function __CONSTRUCT(){
        $this->model = new Persona();
        $this->validacion = new Validacion;       
    }

    public function index(){      
                
        require_once('codex/layout/head.php'); 
        if(!$this->validacion->estaconectado('ROL',1)){
            print $this->validacion->offline();
            exit;
        } 
        $rs=$this->model->consultar('persona');
        
        require_once('codex/layout/nav/nav.php');  
        require_once('codex/view/persona/index.php');    
        
        require_once('codex/layout/footer.php');  
        
    }


    function crud(){
        if($this->validacion->estaconectado('ROL',1)){

            $tp='';
            $identificacion='';
            $nombre='';
            $apellido='';
            $fecha='';
            if(isset($_POST['vid'])){
                $rp=$this->model->consultar('persona', " where persona_id=".$_POST['vid']);
                if($this->model->rows($rp)==1){
                    $obj=$this->model->recorrer($rp);
                    $tp=$obj['persona_tip_id'];
                    $identificacion=$obj['persona_identificacion'];
                    $nombre=$obj['persona_nombre'];
                    $apellido=$obj['persona_apellido'];
                    $fecha=$obj['persona_fecha'];
                }

            }
            $rs=$this->model->consultar('tipo_documento');
            require_once('codex/view/persona/crud.php');
        }
    }


    function guardar(){
        if($this->validacion->estaconectado('ROL',1)){
           
            if(!isset($_POST['tp']) || $_POST['tp']=='' || !isset($_POST['identificacion']) || $_POST['identificacion']==''
            || !isset($_POST['nombre']) || $_POST['nombre']==''
            || !isset($_POST['apellido']) || $_POST['apellido']==''
            || !isset($_POST['fecha']) || $_POST['fecha']==''){
               $this->validacion->mensaje(0,'Datos con *  requeridos');
            }
            $_POST['tp']=$this->validacion->limpiar($_POST['tp']);
            $_POST['identificacion']=$this->validacion->limpiar($_POST['identificacion']);
            $_POST['nombre']=$this->validacion->limpiar($_POST['nombre']);
            $_POST['apellido']=$this->validacion->limpiar($_POST['apellido']);
            $_POST['fecha']=$this->validacion->limpiar($_POST['fecha']);
            $this->validacion->EsNumero($_POST['tp']);
            $this->validacion->EsNombre($_POST['nombre']);
            $this->validacion->EsNombre($_POST['apellido']);

            $tp=$this->model->consultar('tipo_documento'," where tip_id=".$_POST['tp']);
            if($this->model->rows($tp)!=1){
                $_POST['tp']=2;
            }
            $rc=$this->model->consultar('persona'," where persona_identificacion=".$_POST['identificacion']);
            if($this->model->rows($rc)!=0){
                $this->validacion->mensaje(0,'Número de documento ya existe');
            }

            $ok=$this->model->registrar($_POST['tp'],$_POST['identificacion'],$_POST['nombre'],$_POST['apellido'],$_POST['fecha']);
            if($ok>0){
                $this->validacion->mensaje(3,'Si registro','./?c=persona');
            }else{
                $this->validacion->mensaje(1,'Error de registro');
            }

           


        }
    }
}

?>

<?php

date_default_timezone_set('America/Bogota');
//setlocale(LC_MONETARY, 'en_US'); 


@session_start();
require_once('./config.php');
require_once('./codex/lib/validacion.php');
require_once('./codex/lib/database.php');
$currencies[_MONEDA_] = array(2, ',', '.');
define('_HOY_',date('Y-m-d'));
/* Controlador por defecto */
$controller = 'index';

if (file_exists("codex/controller/" .$controller. "Controller.php")) {
    
        // Todo esta lógica hara el papel de un FrontController
        if(!isset($_REQUEST['c']))
        {
            if (file_exists("codex/controller/" .$controller. "Controller.php")) {
                require_once "./codex/controller/" .$controller. "Controller.php";
                $controller = ucwords($controller) . 'Controller';
                                                   
                $controller = new $controller;
                
                    $controller->index();
            }
            else{
                echo "conectando...".$controller;
            }
        }
        else
        {
            // Obtenemos el controlador que queremos cargar
            $controller = strtolower($_REQUEST['c']);
            $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
            
            if (file_exists("codex/controller/" .$controller. "Controller.php")) {    
                // Instanciamos el controlador
                require_once "./codex/controller/".$controller."Controller.php";
                $controller = ucwords($controller) . 'Controller';
                $controller = new $controller;
                
                // Llama la accion
                if(method_exists($controller, strtolower($accion))){
                    call_user_func(array( $controller, $accion ));
                }
            }
            else{
                echo "conectando...".$controller;
            }
        }
}
else{
    echo "conectando...".$controller;
}

?>
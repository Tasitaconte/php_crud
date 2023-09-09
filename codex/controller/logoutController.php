<?PHP


class LogoutController{
        
    

    public function __CONSTRUCT(){
       
        
    }

    public function index(){
        
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Status: 301 Moved Permanently");
        header('Location: ./index.php');
    }

    
}

?>
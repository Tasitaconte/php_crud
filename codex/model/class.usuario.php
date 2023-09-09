<?PHP
class Usuario extends Conexion{

    
    function consultar($tabla,$wh=NULL){
        try {
              
            $conet=new Conexion();
            $sql="SELECT * FROM  $tabla ".$wh;   
            
            $rs=$conet->query($sql);
            //$rs=$rs->fetch_object();
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }


    function recuperar($idusuario,$key){
        try {
            //code...
            $conet=new Conexion();
            $sql="UPDATE `usuario` SET `usuario_pasw`='".$key."' WHERE usuario_id=".$idusuario;
           
            $conet->query($sql);
            $rs=$conet->mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


   
    
}

?> 
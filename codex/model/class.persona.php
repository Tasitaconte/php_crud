<?PHP
class Persona extends Conexion{

    
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


    function registrar($tp,$identificacion,$nombre,$apellido,$fecha){
        try {
              
            $conet=new Conexion();
            $sql=" INSERT INTO `persona`( `persona_tip_id`, `persona_identificacion`, `persona_nombre`, `persona_apellido`, `persona_fecha`) VALUES ($tp,'$identificacion','$nombre','$apellido','$fecha') ";   
            
            $conet->query($sql);
            $rs=mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
              //code...
          } catch (\Throwable $th) {
              //throw $th;
          }
    }

    

}
?>
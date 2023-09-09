<?PHP
class Paciente extends Conexion
{


    function consultar($tabla, $wh = NULL)
    {
        try {
            $conet = new Conexion();
            $sql = "SELECT * FROM  $tabla " . $wh;
            $rs = $conet->query($sql);
            $conet->close();
            return $rs;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    function registrar($nombre, $edad, $genero, $fechaNacimiento, $direccion, $telefono, $password, $email)
    {
        try {

            $conet = new Conexion();
            $sql = " INSERT INTO `paciente`( `Nombre`, `Edad`, `Genero` , `FechaNacimiento`, `Direccion`, `Telefono`,`email`, `password`)
            VALUES ('$nombre','$edad','$genero',$fechaNacimiento,'$direccion','$telefono','$email', MD5('$password'))";
            $conet->query($sql);
            $rs = mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function historial($pacienteID, $AntecedentesMedicos, $Alergias,
     $MedicamentosActuales, $HistorialProcedimientos, $HistorialEnfermedadesFamiliares, $HistorialVacunas, $NotasAdicionales)
    {
        try {
            $conet = new Conexion();
            $sql = " INSERT INTO `historialclinico` (`PacienteID`, `AntecedentesMedicos`, `Alergias`, `MedicamentosActuales` , `HistorialProcedimientos` , `HistorialEnfermedadesFamiliares` , `HistorialVacunas` , `NotasAdicionales`)
            VALUES ('$pacienteID','$AntecedentesMedicos','$Alergias', '$MedicamentosActuales','$HistorialProcedimientos','$HistorialEnfermedadesFamiliares','$HistorialVacunas','$NotasAdicionales')";
            $conet->query($sql);
            $rs = mysqli_affected_rows($conet);
            $conet->close();
            return $rs;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
?>
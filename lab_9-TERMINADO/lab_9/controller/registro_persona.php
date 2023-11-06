<?php
if (!empty($_POST["btnregistrar"])){
    if(!empty($_POST["nombre"])    AND
       !empty ($_POST["apellido"]) AND 
       !empty ($_POST["dni"])      AND 
       !empty ($_POST["fecha"])    AND 
       !empty ($_POST["correo"])){

        
        $nombre = $_POST["nombre"];
        $apellido= $_POST["apellido"];
        $dni     = $_POST["dni"];
        $fecha   = $_POST["fecha"];
        $correo  = $_POST["correo"];
      $sql= $conexion->query("INSERT INTO persona (nombre, apellido, dni, fecha_nac, correo) VALUES('$nombre','$apellido','$dni','$fecha','$correo')");
      if($sql==1)
      {
        echo '<div class="alert alert-success"> PERSONA REGISTRADA CORRECTAMENTE</div>';
      }else {
        echo '<div class="alert alert-success"> ERROR  AL  REGISTRAR PERSONA</div>';
      }
    }else {
        echo '<div class="alert alert-success"> ALGUNOS  CAMPOS ESTAN  VACIOS</div>';
    }
}
?>

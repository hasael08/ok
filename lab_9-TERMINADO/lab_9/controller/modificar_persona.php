<?php
if (!empty($_POST["btnregistrar"])){
    if(!empty($_POST["nombre"])    AND
       !empty ($_POST["apellido"]) AND 
       !empty ($_POST["dni"])      AND 
       !empty ($_POST["fecha"])    AND 
       !empty ($_POST["correo"])){

        $id= $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido= $_POST["apellido"];
        $dni     = $_POST["dni"];
        $fecha   = $_POST["fecha"];
        $correo  = $_POST["correo"];

      $sql= $conexion->query("UPDATE persona set nombre='$nombre', apellido='$apellido', dni='$dni',fecha_nac='$fecha', correo='$correo' where id_persona=$id");

      if($sql==1)
      {
        header("Location:index.php");
      }else {
        echo '<div class="alert alert-success"> ERROR  AL  MODIFICAR PERSONA</div>';
      }
    }else {
        echo '<div class="alert alert-success"> ALGUNOS  CAMPOS ESTAN  VACIOS</div>';
    }
}
?>

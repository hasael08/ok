<?php
include "model/conexion.php";
$id = $_GET['id'];

if (!empty($_POST["btnmodificar"])) {
    if (
        !empty($_POST["nombre"]) &&
        !empty($_POST["apellido"]) &&
        !empty($_POST["dni"]) &&
        !empty($_POST["fecha"]) &&
        !empty($_POST["contrasena"]) &&
        !empty($_POST["correo"]) 
    ) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha = $_POST["fecha"];
        $contrasena = $_POST["contrasena"];
        $correo = $_POST["correo"];

        // Verifica que la persona exista antes de la actualización
        $sqlVerificarPersona = $conexion->prepare("SELECT id_persona FROM persona WHERE id_persona = ?");
        $sqlVerificarPersona->bind_param("i", $id);
        $sqlVerificarPersona->execute();
        $resultadoVerificarPersona = $sqlVerificarPersona->get_result();

        if ($resultadoVerificarPersona->num_rows > 0) {
            // Actualiza los datos en la tabla "persona"
            $sqlActualizarPersona = $conexion->prepare("UPDATE persona SET nombre=?, apellido=?, dni=?, fecha_nac=? WHERE id_persona = ?");
            $sqlActualizarPersona->bind_param("ssisi", $nombre, $apellido, $dni, $fecha, $id);

            if ($sqlActualizarPersona->execute()) {
                // Actualiza los datos en la tabla "usuarios"
                $sqlActualizarUsuarios = $conexion->prepare("UPDATE usuarios SET contrasena=?, correo=? WHERE id_persona = ?");
                $sqlActualizarUsuarios->bind_param("ssi", $contrasena, $correo, $id);

                if ($sqlActualizarUsuarios->execute()) {
                    header("Location: index.php");
                } else {
                    echo '<div class="alert alert-danger">Error al modificar los datos de usuario.</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Error al modificar los datos de persona.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">La persona no existe.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Algunos campos están vacíos.</div>';
    }
}
?>
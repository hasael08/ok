<?php
if (!empty($_POST["btnregistrar"])) {
    if (
        !empty($_POST["nombre"]) &&
        !empty($_POST["apellido"]) &&
        !empty($_POST["dni"]) &&
        !empty($_POST["fecha"]) &&
        !empty($_POST["correo"]) &&
        !empty($_POST["contrasena"])
    ) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];
        $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT); // Hash de la contraseña

        // Insertar en la tabla "persona"
        $sqlPersona = $conexion->prepare("INSERT INTO persona (nombre, apellido, dni, fecha_nac) VALUES (?, ?, ?, ?)");

        if (!$sqlPersona) {
            die("Error en la preparación de la consulta para persona: " . $conexion->error);
        }

        $sqlPersona->bind_param("ssss", $nombre, $apellido, $dni, $fecha);
        $sqlPersona->execute();

        if ($sqlPersona) {
            // Obtener el ID de la persona recién insertada
            $idPersona = $conexion->insert_id;

            // Insertar en la tabla "usuarios" con el ID de la persona
            $sqlUsuarios = $conexion->prepare("INSERT INTO usuarios (id_persona, correo, contrasena) VALUES (?, ?, ?)");

            if (!$sqlUsuarios) {
                die("Error en la preparación de la consulta para usuarios: " . $conexion->error);
            }

            $sqlUsuarios->bind_param("iss", $idPersona, $correo, $contrasena);
            $sqlUsuarios->execute();

            if ($sqlUsuarios) {
                echo '<div class="alert alert-success">PERSONA Y USUARIO REGISTRADOS CORRECTAMENTE</div>';
            } else {
                die("Error al ejecutar la consulta para usuarios: " . $conexion->error);
            }
        } else {
            die("Error al ejecutar la consulta para persona: " . $conexion->error);
        }
    } else {
        echo '<div class="alert alert-danger">ALGUNOS CAMPOS ESTÁN VACÍOS</div>';
    }
}
?>

<?php
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Primero, obtén el correo del usuario para eliminarlo de la tabla "usuarios"
    $correoUsuario = '';

    $sqlCorreo = $conexion->prepare("SELECT correo FROM usuarios WHERE id_persona = ?");
    $sqlCorreo->bind_param("i", $id);
    $sqlCorreo->execute();
    $result = $sqlCorreo->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $correoUsuario = $row['correo'];
    }

    // Ahora elimina al usuario de la tabla "usuarios"
    $sqlUsuarios = $conexion->prepare("DELETE FROM usuarios WHERE id_persona = ?");
    $sqlUsuarios->bind_param("i", $id);
    $sqlUsuarios->execute();

    // A continuación, elimina el registro de la tabla "persona"
    $sqlPersona = $conexion->prepare("DELETE FROM persona WHERE id_persona = ?");
    $sqlPersona->bind_param("i", $id);
    $sqlPersona->execute();

    if ($sqlUsuarios && $sqlPersona) {
        header("location:index.php");
    } else {
        echo '<div class="alert alert-danger">ERROR AL ELIMINAR PERSONA O USUARIO</div>';
    }
}
?>

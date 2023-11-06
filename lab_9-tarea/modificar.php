<?php
include "model/conexion.php";
$id = $_GET['id'];
$sql = $conexion->query("SELECT persona.*, usuarios.correo, usuarios.contrasena FROM persona
                        LEFT JOIN usuarios ON persona.id_persona = usuarios.id_persona
                        WHERE persona.id_persona = $id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR PERSONA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid row">
        <form class="col-4" method="POST">
            <h3 class="text-center text-secondary">MODIFICAR PERSONA</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"]?>">
            <?php
            include "controller/modificar_persona.php";
            while ($datos = $sql->fetch_object()) { ?>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la Persona</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->nombre; ?>">
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido de la Persona</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $datos->apellido; ?>">
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label">DNI de la Persona</label>
                    <input type="text" class="form-control" id="dni" name="dni" value="<?= $datos->dni; ?>">
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?= $datos->fecha_nac; ?>">
                </div>
            
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?= $datos->contrasena; ?>">
                </div>

                <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?=$datos->correo; ?>">
                </div>
            <?php
            }
            ?>

            <button type="submit" class="btn btn-primary" name="btnmodificar" value="OK">MODIFICAR</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO PERSONAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<body>
    
 <div class="container-fluid row">
   
<form class="col-4" method="POST">
<h3 class="text-center text-secundary"> REGISTRO DE  PERSONAS</h3>  
    
<?php 
    include  "model/conexion.php"; 
    include  "controller/registro_persona.php";
    include  "controller/eliminar_persona.php";
    ?>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre  de  la  Persona</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">APELLIDO  DE LA  PESONA</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="apellido">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">DNI de  la  Persona</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dni">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">FECHA DE  NACIMIENTO</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fecha">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">CORREO</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo">
  </div>

  <button type="submit" class="btn btn-primary" name="btnregistrar" value="OK">REGISTRAR</button>
</form>

  <div class="col-8 p-4">
  <table class="table">
  <thead class="bg-info">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">DNI</th>
      <th scope="col">FECHA  DE  NACIMIENTO</th>
      <th scope="col">CORREO</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include  "model/conexion.php";
    $sql= $conexion->query("SELECT * FROM persona");
    while ($datos = $sql-> fetch_object()){ ?>
    <tr>
      <td><?= $datos ->id_persona;?></td> 
      <td><?= $datos ->nombre;?></td>
      <td><?= $datos ->apellido;?></td>
      <td><?= $datos ->dni;?></td>
      <td><?= $datos ->fecha_nac;?></td>
      <td><?= $datos ->correo;?></td>
      <td>
        <a href="modificar.php?id=<?=$datos->id_persona?>" class="btn btn-info">EDITAR</a>
        <a href="index.php?id=<?=$datos->id_persona?>" class="btn btn-danger">ELIMINAR</a>
      </td>
      
    </tr>
    <?php
   }
   ?>

  </tbody>
</table>
  </div>
 </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conexion->query("DELETE from persona WHERE id_persona=$id");
    if($sql==1){
        header ("location:index.php");
    }else{
        echo '<div class="alert alert-danger">ERROR AL ELIMINAR PERSONA</div>';
    }
}
?>
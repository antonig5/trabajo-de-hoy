<?php
session_start();

require('../conexion/conexion.php');

if (isset($_POST['idMatri'])) {
$idM=$_POST['idMatri'];
    $idE=$_POST['idMa'];
    
    
    
    
    $sql1 = "INSERT INTO detallematricula (idMatri,idMa) values ( ?,?)";
    $resultado = $base_de_datos->prepare($sql1); //$base es el nombre de la conexión
    $resultado->execute(array($idM,$idE));
    
    header("Location:matricular.php");
    }else{
    echo'fin';
    }
    
?>


<form class="row g-3" method="POST" action="">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="text" class="form-control" id="inputEmail4" name="idMa">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="hidden" class="form-control" id="inputEmail4" name="idMatri" >
  </div>
  
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="agregar">Sign in</button>
  </div>
</form>
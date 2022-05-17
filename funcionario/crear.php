<?php
session_start();
require_once('../conexion/conexion.php');

if (isset($_POST['idEs'])) {

$idE=$_POST['idEs'];
$grado = $_POST['grado'];



$sql1 = "INSERT INTO matricula (idEs,idUser,idGrado) values ( ?,?,?)";
$resultado = $base_de_datos->prepare($sql1); //$base es el nombre de la conexión
$resultado->execute(array($idE,$_SESSION['id'],$grado));

header("Location:matricular.php");
}else{
echo'fin';
}



?>



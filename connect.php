<?php
include('condb.php');

$nombre = $_POST['nombre'];

$apellido = $_POST['apellido'];

$celular = $_POST['celular'];
$email = $_POST['email'];
$curso = $_POST['curso'];
$periodo = $_POST['periodo'];


$consulta = "INSERT INTO registro
(nombre,apellido,celular,email,curso, periodo) VALUES ('$nombre', '$apellido','$celular','$email','$curso', '$periodo')";


if(mysqli_query($conex, $consulta)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $consulta. " . mysqli_error($conex);
}
    
    

?>
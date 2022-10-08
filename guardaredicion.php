<?php



function db_query($query) {
    $connection = mysqli_connect("localhost","root","123456","registro");
    $result = mysqli_query($connection,$query);

    return $result;
}

function guardar($tblname,$nombre, $apellido, $celular, $email, $curso, $periodo, $id){ //Funcion para borrar registros

 echo $nombre, $apellido, $email,$celular;
   
//	$sql = "UPDATE $tblname SET CELULAR =".$celular.", NOMBRE = ".$nombre.", APELLIDO = ."$apellido.", EMAIL = ".$email.", CURSO = ".$curso.", PERIODO =".$periodo." WHERE COD =".$id."";
	$sql = "UPDATE registro SET NOMBRE = '".$nombre."', APELLIDO = '".$apellido."', CELULAR = '".$celular."', EMAIL = '".$email."', CURSO = '".$curso."', PERIODO = '".$periodo."'  WHERE COD = ".$id."";
    return db_query($sql);
}
?>

<?php 
$id = $_GET['id'];


$nombre = $_POST['nombre'];
    
$apellido = $_POST['apellido'];

$celular = $_POST['celular'];
$email = $_POST['email'];
$curso = $_POST['curso'];
$periodo = $_POST['periodo'];

//echo $nombre, $apellido, $celular, $email, $curso, $periodo;



guardar('registro',$nombre, $apellido, $celular, $email, $curso, $periodo, $id);
//guardar('registro', 32);

header("location:index.php");




?>
<?php 
function db_query($query) {
    $connection = mysqli_connect("localhost","root","123456","registro");
    $result = mysqli_query($connection,$query);

    return $result;
}

function delete($tblname,$field_id,$id){ //Funcion para borrar registros

	$sql = "delete from ".$tblname." where ".$field_id."=".$id."";
	
	return db_query($sql);
}
?>

<?php 
$id = $_GET['id'];
delete('registro','COD',$id);
header("location:index.php");
?>
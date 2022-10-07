<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes de CiberAulas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>



</head>
<body>

<?php
include('condb.php');


$nombre = $_POST['nombre'];

$apellido = $_POST['apellido'];

$celular = $_POST['celular'];
$email = $_POST['email'];
$curso = $_POST['curso'];
$periodo = $_POST['periodo'];




 
    

?>


<div class="container">
    <form action="index.php" method="post">

        <h1>Registro de Estudiantes de CiberAulas</h1>
        <div class="form-control mt-3 pl-3 pr-3">

            <div class="row">
                <div class="col">
                    <label for="nombre">Nombre</label>
                    <input type="nombre" name="nombre" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Ingrese su nombre">
                </div>

                <div class="col">
                    <label for="apellido">Apellido</label>
                    <input type="apellido" name="apellido" class="form-control" id="apellido" aria-describedby="apellido" placeholder="Ingrese su apellido">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="celular">Celular</label>
                    <input type="celular" name="celular" class="form-control" id="celular" aria-describedby="celular" placeholder="Ingrese su apellido">
                </div>

                <div class="col">  
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Ingrese su apellido">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="nombre">Curso</label>
                

                    <select name ="curso" class="form-control mr-sm-2" id="curso">
                        <option selected>Elegir...</option>
                        <option value="scratch adultos">Programación Scratch Adultos</option>
                        <option value="scratch niños">Programación Scratch Niños</option>
                        <option value="canva">Canva</option>
                    </select>

                </div>

                <div class="col-md-6">
                    <label for="nombre">Período</label>
                

                    <select name="periodo" class="form-control mr-sm-2" id="curso">
                        <option selected>Elegir...</option>
                        <option value="octubre">Octubre</option>
                        <option value="noviembre">Noviembre</option>
                        <option value="diciembre">Diciembre</option>
                    </select>

                </div>

            

        </div>

<?php


if(isset($_POST['nombre'])){
    $consulta = "INSERT INTO registro
    (nombre,apellido,celular,email,curso, periodo) VALUES ('$nombre', '$apellido','$celular','$email','$curso', '$periodo')";
    if(mysqli_query($conex, $consulta)){
        ?> 
        <div class="alert alert-primary" role="alert">
        Registro insertado correctamente!
        </div>
        <?php
      
    } else{
        echo "ERROR: No se pudo ejecutar la consulta $consulta. " . mysqli_error($conex);
    }

}

?>



        <div class="form-group mt-3 pl-3 pr-3">
        <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>







    <div id="tablaregistro" class="mt-4">

    <table id="example" class="display table table-bordered" style="width:100%">
            <thead>
                <tr><th>Nro</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Curso</th>
                    <th>Periodo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>

    <?php

    $inc = include("condb.php");

    if($inc){
        $i = 0;
        $consultar= "SELECT * FROM registro";
        $result = mysqli_query($conex, $consultar);
        if($result){
           while($row = $result->fetch_array()){
            $nomb = $row['NOMBRE'];
            $apell = $row['APELLIDO'];
            $cel = $row['CELULAR'];
            $ema= $row['EMAIL'];
            $curs = $row['CURSO'];
            $peri = $row['PERIODO'];
            $i = $i +1;

   

            ?>


    
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $nomb; ?></td>
                    <td><?php echo $apell; ?></td>
                    <td><?php echo $cel; ?></td>
                    <td><?php echo $ema; ?></td>
                    <td><?php echo $curs; ?></td>
                    <td><?php echo $peri; ?></td>
                    <td class="text-center"><strong><span style="color:red">X</span></strong></td>
</td>
                </tr>
     
                <?php

           }
        

        }

    }

  

    ?>
      </tbody>
    </table>


</div>

 </div>
 

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
    </script>
                </body>


                </html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORRAR REGISTRO</title>
</head>
<body>

<?php 

include('conector.php');

    $id =$_GET['id'];
    $mes = $_GET['mes'];
    $semana = $_GET['semana'];

    $sql = "DELETE FROM $mes$semana WHERE ID='$id'";
    $query = $conn->query($sql);

    //var_dump($sql);

    header("Location:index.php?");
?>
    
</body>
</html>
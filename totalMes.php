<?php

require_once 'conector.php';


// No mostrar los errores de PHP
error_reporting(0);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/datatables.net/js/jquery.dataTables.min.js"></script>

    <script src="./node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>

    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">


    <script>
        $(document).ready(function() {
            $('#example').DataTable({


                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Hay _TOTAL_ Resultados",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Resultados",
                    "infoFiltered": "(Filtrado de _MAX_ total Resultados)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Resultados",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>

    <title>Total mes</title>
</head>
<body>

<div class="container border rounded-3 p-3 justify-content-center  mt-3  mb-2 ">
<h1 class=" text-center">TOTAL MES <a href="index.php?mes=marzo&semana=2"><input class="btn btn-primary" type="button" value="INICIO"></a></h1>

<table id="example" class="table mt-2 table-dark  table-striped table-hover table-bordered " width="100%" data-page-length="5">

    <thead class="text-center border">
        <tr>
            <th>ID</th>
            <th>FECHA</th>
            <th>EFECTIVO</th>
            <th>TARJETA</th>
            <th>GASOLINA</th>
            <th>TOTAL</th>
            <th>OPCIONES</th>
        </tr>
    </thead>


    <?php
    // $mes = $_GET["meses"];
    // $semana = $_GET["semanas"];
    $sumar_efectivo = 0;
    $sumar_tarjeta = 0;
    $sumar_gasolina = 0;
    $sumar_caja = 0;
    $beneficio = 0;
    // $ingresar = 0;
    // $propinas = 0;

    // var_dump($mes);

    $sql = "SELECT * FROM marzo ORDER BY id";

    $query = $conn->query($sql);

    foreach ($query as $row) :

        // $mes = $_GET["meses"];
        // $semana = $_GET["semanas"];
         $sumar_efectivo = $sumar_efectivo + floatval($row['efectivo']);
         $sumar_tarjeta = $sumar_tarjeta + floatval($row['tarjeta']);
         $sumar_gasolina = $sumar_gasolina + floatval($row['gasolina']);
         $sumar_total = $sumar_total+ floatval($row['total']);
        

         $beneficio = $sumar_total - $sumar_gasolina;


    ?>


        <tr>
            <td class="text-center"><?php echo  $row['id']  ?></td>
            <td class="text-center" style="color: lightskyblue;font-size:1.2rem;"><?php echo  $row['fecha']  ?></td>

            <td class="text-center"> <?php echo  $row['efectivo']  ?>€</td>

            <td class="text-center"><?php echo $row['tarjeta'] ?> €</td>

            <td class="text-center"><?php echo $row['gasolina'] ?> €</td>
            <td class="text-center"><?php echo $row['total'] ?> €</td>

            <td class="text-center"><a href="borrarReg.php?id=<?php echo $row['id']; ?>&mes=<?php echo $mes ?>&semana=<?php echo $semana ?>"><i id='borrar' name='borrar' class="bi bi-trash-fill btn btn-danger" type='button' onclick="return confirm('Estas seguro que quieres borra el registro?')"></i> </a>

                <a href="editarReg.php?id=<?php echo $row['id']; ?>&meses=<?php echo $mes; ?>&semanas=<?php echo $semana ?>&fecha=<?php echo $row['fecha']; ?>&efectivo=<?php echo $row['efectivo']; ?>&tarjeta=<?php echo $row['tarjeta']; ?>&gasolina?<?php echo $gasolina ?>">
                    <i class="bi bi-pencil btn btn-warning" id='editar' name='editar'></i>


                </a>
            </td>
            

        <?php endforeach; ?>

        
</table>

</div>


</div>

<div class="container  p-4 mt-3 border mb-5  rounded-3">
<div class="row ">
<div class="col">
    <h1 class="border rounded-3 p-2 text-center"><?php echo "EFECTIVO" . "<br><spam style='color:lawngreen;'>" .  $sumar_efectivo;  ?>€</spam>
    </h1>
</div>
<div class="col">
    <h1 class="border rounded-3 p-2 text-center"><?php echo "TARJETA" . "<br><spam style='color:blue;'>" .  $sumar_tarjeta;  ?>€</spam>
    </h1>
</div>
<div class="col">
    <h1 class="border rounded-3 p-2 text-center"><?php echo "GASOLINA" . "<br><spam style='color:red;'>" .  $sumar_gasolina; ?>€</spam>
    </h1>
</div>
<div class="col">
    <h1 class="border rounded-3 p-2 text-center"><?php echo "TOTAL" . "<br><spam style='color:lawngreen;'>" .  $sumar_total;  ?>€</spam>
    </h1>
</div>
<div class="col">
    <h1 class="border rounded-3 p-2 text-center"><?php echo "BENEFICIO" . "<br><spam style='color:lawngreen;'>" . $beneficio;  ?>€</spam>
    </h1>
</div>

</div>
    
</body>
</html>
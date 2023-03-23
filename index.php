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

    <title>Efectivo - Tarjeta</title>
</head>

<body>

    <?php


    if (isset($_POST['insertar'])) {

        $mes = $_POST['meses'];

        $semana = $_POST['semanas'];

        $fecha = $_POST['fecha'];

        $efectivo = $_POST['efectivo'];

        $tarjeta = $_POST['tarjeta'];

        $gasolina = $_POST['gasolina'];

        $total = $_POST['total'];

        $sql = "INSERT INTO $mes$semana (fecha, efectivo,tarjeta,gasolina, total ) 
    VALUES ('$fecha','$efectivo','$tarjeta','$gasolina','$total')";
        $query = $conn->query($sql);

        // var_dump($sql);

    }

    $crear = "";


    if (isset($_POST['crear'])) $crear = $_POST['crear'];

    if ($crear) {
        $mes = $_POST['nuevo'];
        $semana = $_POST['semanas'];
        $sql = "CREATE TABLE `taxi`.`$mes$semana` ( `id` INT NOT NULL AUTO_INCREMENT , `fecha` VARCHAR(150) NOT NULL , `efectivo` DOUBLE NOT NULL , `tarjeta` DOUBLE NOT NULL ,`gasolina` DOUBLE NOT NULL , `total` DOUBLE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $query = $conn->query($sql);
    }

    //var_dump($sql);

    ?>
    <h1 class="p-3 text-center">CONTROL DE EFECTIVO</h1>
    <div class="container mt-2 overflow-auto rounded-3 border d-flex p-3 justify-content-center">


        <form action="index.php" class="row ">
            <div class="col">

                <span class="input-group-text me-2 mt-2 bg-info text-white w-100 rounded-3" id="inputGroup-sizing-default">MES
                    <select name="meses" class="form-select  ms-2" id="meses">

                        <option value=""> mes</option>
                        <option value="enero">ENERO</option>
                        <option value="febrero">FEBRERO</option>
                        <option value="marzo">MARZO</option>
                        <option value="abril">ABRIL</option>
                        <option value="mayo">MAYO</option>
                        <option value="junio">JUNIO</option>
                        <option value="julio">JULIO</option>
                        <option value="agosto">AGOSTO</option>
                        <option value="septiembre">SEPTIEMBRE</option>
                        <option value="octubre">OCTUBRE</option>
                        <option value="noviembre">NOVIEMBRE</option>
                        <option value="diciembre">DICIEMBRE</option>


                    </select>
                    <select name="semanas" class="form-select  ms-2" id="semanas" onchange="this.form.submit()">
                        <option value="">semanas</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                    </select></span>
            </div>

        </form>



        <form class="row ms-2" action="<?php echo $_SERVER['PHP_SELF']; ?>?meses=<?php echo $mes . $semana ?>" method="post">
            <div class="input-group ms-1 mb-2 mt-2 ">
                <span class="input-group-text bg-success text-white" id="inputGroup-sizing-default">NUEVO
                    <input type="text" id="nuevo" name="nuevo" class="form-control ms-2" placeholder="nuevo mes" required><select name="semanas" class="form-select  ms-2" id="semanas">
                        <option value="">semanas</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                    </select>
                    <input type="submit" id="crear" name="crear" class="btn btn-primary border border-1 ms-3 text-white" value="CREAR"></span>
            </div>


        </form>

    </div>
    <div class="container border rounded-3 p-3 d-flex ">

        <div class="container rounded-3 justify-content-center" style="width:28% ;">

            <form name="formulario" class="p-3" action="<?php echo $_SERVER['PHP_SELF']; ?>?meses=<?php echo $mes . $semana ?>" method="post">

                <div class="col">

                    <label class=" p-2 ms-1">MES</label>
                    <select name="meses" class="form-select  ms-2" id="meses1">

                        <option value=""> mes</option>
                        <option value="enero">ENERO</option>
                        <option value="febrero">FEBRERO</option>
                        <option value="marzo">MARZO</option>
                        <option value="abril">ABRIL</option>
                        <option value="mayo">MAYO</option>
                        <option value="junio">JUNIO</option>
                        <option value="julio">JULIO</option>
                        <option value="agosto">AGOSTO</option>
                        <option value="septiembre">SEPTIEMBRE</option>
                        <option value="octubre">OCTUBRE</option>
                        <option value="noviembre">NOVIEMBRE</option>
                        <option value="diciembre">DICIEMBRE</option>


                    </select>
                    <label class=" p-2 ms-1">SEMANA</label>
                    <select name="semanas" class="form-select  ms-2" id="semanas1">
                        <option value="">semana</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                    </select>
                </div>

                <label for="fecha" class=" p-2 ms-1">FECHA</label>
                <input type="text" id="fecha" class="form-control ms-2" name="fecha">

                <label for="efectivo" class=" p-2 ms-1">EFECTIVO</label>
                <input type="text" name="efectivo" class="form-control p-2 ms-2" placeholder="efectivo €">

                <label for="tarjeta" class=" p-2 ms-1">TARJETA</label>
                <input type="text" name="tarjeta" class="form-control p-2 ms-2" placeholder="tarjeta €"></span>
                <label for="tarjeta" class=" p-2 ms-1">GASOLINA</label>
                <input type="text" name="gasolina" class="form-control p-2 ms-2" placeholder="gasolina €"></span>

                <label for="tarjeta" class=" p-2 ms-1">TOTAL</label>
                <input type="text" name="total" id="total" class="form-control p-2 ms-2" placeholder="total €"></span>

                <input type="submit" name="insertar" value="GUARDAR" class="btn btn-success text-white ms-2 mt-3 rounded-3">



            </form>
        </div>
        <div class="container border rounded-3 p-3 justify-content-center  mt-3  mb-2 ">

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
                $mes = $_GET["meses"];
                $semana = $_GET["semanas"];
                $sumar_efectivo = 0;
                $sumar_tarjeta = 0;
                $sumar_gasolina = 0;
                $sumar_caja = 0;
                $beneficio = 0;          
                // $propinas = 0;

                // var_dump($mes);

                $sql = "SELECT * FROM $mes$semana ORDER BY id";

                $query = $conn->query($sql);

                foreach ($query as $row) :

                    $mes = $_GET["meses"];
                    $semana = $_GET["semanas"];
                    $sumar_efectivo = $sumar_efectivo + floatval($row['efectivo']);
                    $sumar_tarjeta = $sumar_tarjeta + floatval($row['tarjeta']);
                    $sumar_gasolina = $sumar_gasolina + floatval($row['gasolina']);
                    $sumar_caja = $sumar_efectivo + $sumar_tarjeta;

                    $beneficio = $sumar_caja - $sumar_gasolina;


                ?>


                    <tr>
                        <td class="text-center"><?php echo  $row['id']  ?></td>
                        <td class="text-center" style="color: lightskyblue;font-size:1.2rem;"><?php echo  $row['fecha']  ?></td>

                        <td class="text-center"> <?php echo  $row['efectivo']  ?>€</td>

                        <td class="text-center"><?php echo $row['tarjeta'] ?> €</td>

                        <td class="text-center"><?php echo $row['gasolina'] ?> €</td>
                        <td class="text-center"><?php echo $sumar_caja ?> €</td>

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
                <h1 class="border rounded-3 p-2 text-center"><?php echo "TOTAL" . "<br><spam style='color:lawngreen;'>" .  $sumar_caja;  ?>€</spam>
                </h1>
            </div>
            <div class="col">
                <h1 class="border rounded-3 p-2 text-center"><?php echo "BENEFICIO" . "<br><spam style='color:lawngreen;'>" . $beneficio;  ?>€</spam>
                </h1>
            </div>

            <?php


            if (isset($_POST['insertarTotales'])) {

                $mes = $_POST['mesesTotal'];

                $semana = $_POST['semanas'];

                $fechaMes = $_POST['fechaMes'];

                $efectivoTotal = $_POST['totalEfectivo'];

                $tarjetaTotal = $_POST['totalTarjeta'];

                $gasolinaTotal = $_POST['totalGasolina'];

                $totalMes = $_POST['totalMes'];
              

                $sql = "INSERT INTO $mes (fecha, efectivo,tarjeta,gasolina, total ) 
                        VALUES ('$fechaMes','$efectivoTotal','$tarjetaTotal','$gasolinaTotal','$totalMes')";
                $query = $conn->query($sql);

                //var_dump($sql);
            }
            ?>

            <div class="border rounded-3 mt-3" style="height:150px;">
            <div class="row ">
                    <div class="col-2">
                        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            
                                <label class="text-light">MES</label>
                                <select name="mesesTotal" class="form-select text-white border border-light bg-dark border-5" id="meses2">

                                    <option value=""> mes</option>
                                    <option value="enero">ENERO</option>
                                    <option value="febrero">FEBRERO</option>
                                    <option value="marzo">MARZO</option>
                                    <option value="abril">ABRIL</option>
                                    <option value="mayo">MAYO</option>
                                    <option value="junio">JUNIO</option>
                                    <option value="julio">JULIO</option>
                                    <option value="agosto">AGOSTO</option>
                                    <option value="septiembre">SEPTIEMBRE</option>
                                    <option value="octubre">OCTUBRE</option>
                                    <option value="noviembre">NOVIEMBRE</option>
                                    <option value="diciembre">DICIEMBRE</option>


                                </select>
                            
                    </div>
                    
                       
                            <div class="col-2">
                                FECHA
                                <input type="text" name="fechaMes" id="fechaMes" class="form-control border border-info border-5 text-info bg-dark" placeholder="fecha mes"></span>
                            </div>
                            <div class="col-2">
                                TOTALEFECTIVO
                                <input type="text" name="totalEfectivo" id="totalEfectivo" class="form-control text-success border border-success border-5 bg-dark" placeholder="total efectivo €"></span>
                            </div>
                            <div class="col-2">
                                TOTALTARJETA
                                <input type="text" name="totalTarjeta" id="totalTarjeta" class="form-control text-primary border border-primary border-5 bg-dark" placeholder="total tarjeta €"></span>
                            </div>
                            <div class="col-2">
                                TOTALGASOLINA
                                <input type="text" name="totalGasolina" id="totalGasolina" class="form-control border border-danger  border-5 text-danger bg-dark" placeholder="total gasolina€"></span>
                            </div>
                            <div class="col-2">
                                TOTAL SEMANA
                                <input type="text" name="totalMes" id="totalMes" class="form-control border border-warning border-5 text-warning bg-dark" placeholder="total €"></span>
                            </div>
                            
             
                        </form>
                  

            </div>
            <div class="text-center">
                            <input type="submit" style="border:solid 5px #20c997 ;" name="insertarTotales" value="GUARDAR" class="btn btn-success text-white ms-2 mt-3 rounded-3 ">
                
                            <a href="totalMes.php?mes=<?php echo $mes ?>&semana=<?php echo $semana ?>"><input class="btn btn-primary rounded-3 ms-2 mt-3 border border-5 border-info" type="button" value="TOTAL MES"></a>
            </div>

                
                <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
                <script>
                    let dias_semanas = ["DOMINGO", "LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO"]; 
                    
                    var today = new Date();                    
                    var day = today.getDate();
                    var month = today.getMonth() + 1;                    
                    var year = today.getFullYear();                    
                    document.getElementById('fecha').value = dias_semanas[today.getDay()] + ' ' + day + '/' + month + '/' + year;
                    document.getElementById('fechaMes').value = dias_semanas[today.getDay()] + ' ' + day + '/' + month + '/' + year;


                    document.getElementById('total').value = "<?php echo $sumar_caja ?>";
                    document.getElementById('totalMes').value = "<?php echo $sumar_caja ?>";
                    document.getElementById('totalEfectivo').value = "<?php echo $sumar_efectivo ?>";
                    document.getElementById('totalTarjeta').value = "<?php echo $sumar_tarjeta ?>";
                    document.getElementById('totalGasolina').value = "<?php echo $sumar_gasolina ?>";
                   // document.getElementById('meses1').value = "marzo";
                   // document.getElementById('semanas1').value = "3";
                    
                </script>

</body>

</html>

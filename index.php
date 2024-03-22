<?php
        //CONEXION BD
        include 'BD/conexion.php';
        $participante="";
        if(!empty($_POST)){
            $valor = TRIM($_POST['buscador']);
            if(!empty($valor)){
                $objeto = new Conexion();
                $conexion = $objeto->Conectar();

                $consulta = "SELECT id,participante,ciParticipante,departamento,municipio,cuidad,nombreFacilitador,ciFacilitador,rdaFacilitador,estado,fechaInicio,fechaFin
                FROM participantes WHERE participante LIKE '%$valor%' OR ciParticipante LIKE '%$valor%'";

                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                $participante=$resultado->fetchAll(PDO::FETCH_ASSOC);
            } 
        }        
 
    ?>

<!DOCTYPE html>
<HTML>
    <head>
    <meta chaset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel= "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title> .:ALFABETIZACIÓN:. </title>
    </head>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        <h1 class="text-center"> REGISTRO DE PARTICIPANTES ALFABETIZADOS </h1>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="POST">
                <input type="text" name="buscador" class="form-control" placeholder="Ingrese Nombre o CI del Participante"><br>
                <input type="submit" value= "Buscar" class="btn-block btn-sm btn-success">
            </form>

        </div>

        <div class="col-sm-12 col-md-12 col-lg-12"> <br>
        <div class="table-responsive">
        <?php if($participante>0 ) { ?> 
        <table class="table">
                <thead class="text-muted">
                    <tr>
                        <th>#</th>
                        <th>Participante</th>
                        <th>CI_Participante</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Ciudad</th>
                        <th>Facilitador</th>
                        <th>CI_Facilitador</th>
                        <th>RDA_Facilitador</th>
                        <th>Estado</th>
                        <th>Fecha_Inicio</th>
                        <th>Fecha_Fin</th>
                    </tr>
                </thead>
                <tbody>      
                    <?php foreach($participante as $participantes) { ?>          
                    <tr>
                        <td> <?php echo $participantes['id']; ?></td>
                        <td> <?php echo $participantes['participante']; ?></td>
                        <td> <?php echo $participantes['ciParticipante']; ?></td>
                        <td> <?php echo $participantes['departamento']; ?></td>
                        <td> <?php echo $participantes['municipio']; ?></td>
                        <td> <?php echo $participantes['cuidad']; ?></td>
                        <td> <?php echo $participantes['nombreFacilitador']; ?></td>
                        <td> <?php echo $participantes['ciFacilitador']; ?></td>
                        <td> <?php echo $participantes['rdaFacilitador']; ?></td>
                        <td> <?php echo $participantes['estado']; ?></td>
                        <td> <?php echo $participantes['fechaInicio']; ?></td>
                        <td> <?php echo $participantes['fechaFin']; ?></td>
                    </tr>    
                    <?php }
                    ?>    
                </tbody>
            </table>
            <?php }?>                     
        </div>
        
        </div>
    </div>
    
</div>
    
    


</body>

</HTML>
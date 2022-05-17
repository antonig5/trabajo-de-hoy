<?php include('../menu/headerF.php');

require_once('../conexion/conexion.php');






$busca = $_GET["busca"];
$sql = "SELECT  * from matricula INNER JOIN estudiantes ON estudiantes.idEs=matricula.idEs WHERE matricula.idEs=:co";

$resultado = $base_de_datos->prepare($sql); //el objeto $base llama al metodo prepare que recibe por parametro la instrucción sql, el metodo prepare devuelve un objeto de tipo PDO que se almacena en la variable resultado


$resultado->execute(array(":co" => $busca));




if ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $matri = $registro['idMatri'];





?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Document</title>
    </head>

    <body style="background-color: #3e8ef7;">
        <div class="row justify-content-center mt-5 w-80  mb-5 mx-5 h-100">
            <div class="card h-100">
                <form class="mt-5">
                    <div class="row justify-content-center mb-3 ">
                        <div class="col-md-3">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busca">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                </form>
                <form class="mt-5" method="POST" action="crear.php">
                    <div class="col-md-3">
                        <label for="formGroupExampleInput" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputUsername" name="Enombre" value="<?php echo $registro['Enombre']; ?>">
                    </div>
            </div>
            <div class="row justify-content-center mb-3 ">

                <div class="col-md-3">
                    <label for="formGroupExampleInput" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="inputUsername" name="Eapellido" value="<?php echo $registro['Eapellido'] ?>">
                </div>
            </div>
            <div class="row justify-content-center mb-3 ">

                <div class="col-md-3">

                    <input type="hidden" class="form-control" id="inputUsername" name="idEs" value="<?php echo $registro['idEs'] ?>">
                </div>
            </div>
            <div class="row justify-content-center mb-3 mt-3">

                <div class="col-md-3">
                    <label for="formGroupExampleInput" class="form-label">Grado</label>
                    <select class="form-select" aria-label="Default select example" name="grado">
                        <?php
                        $sql = "SELECT * FROM grados";
                        $resultado = $base_de_datos->prepare($sql);
                        $resultado->execute(array());
                        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {

                        ?>

                            <option value="<?php echo $registro['idGrado']; ?>"><?php echo $registro['grado'] ?></option>
                        <?php
                        }


                        ?>
                    </select>
                </div>
            </div>

            <div class="row justify-content-center ">
                <div class="col-md-2 mt-3 me-5 mb-5">
                    <button type="submit" class="btn btn-primary btn-lg " style="width: 15rem;" name="matricular">Matricular</button>
                </div>
                <a href="detalle.php?idMatri=<?php echo $matri ?> " class="btn btn-primary">
                    Añadir materias
                </a>
            </div>



    </body>

    </html>
<?php
}






?>
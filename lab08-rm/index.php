<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <div class="card-header bg-dark text-white text-center">
            AGREGAR PRODUCTO
        </div>

        <form action="Buscador.php" method="get">
            <input class="btn btn-primary" name="Buscar" type="submit" value="Buscar">
        </form>

        <div class="card-body">
            <form action="Agregar_Producto.php" method="post">

                <div class="row g-1 mb-3 palign-items-center">
                    <div class="col-auto">
                        <label for="Nombre" class="col-form-label">Nombre</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="Nombre" id="nombre" class="form-control" aria-labelledby="passwordHelpInline" required>
                    </div>
                </div>
                <div class="row g-1 mb-3 align-items-center">
                    <div class="col-auto">
                        <label for="Descripcion" class="col-form-label">Descripcion</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="Descripcion" id="descripcion" class="form-control" required>
                    </div>
                </div>
                <div class="row g-1 mb-3 palign-items-center">
                    <div class="col-auto">
                        <label for="Stock" class="col-form-label">Stock</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="Stock" id="stock" class="form-control" aria-labelledby="passwordHelpInline" required>
                </div>
                <div class="row g-1 mb-3 palign-items-center">
                    <div class="col-auto">
                        <label for="PrecioVenta" class="col-form-label">PrecioVenta</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="PrecioVenta" id="precioventa" class="form-control" aria-labelledby="passwordHelpInline" required>
                    </div>
                </div>
                <input class="btn btn-primary d-grid gap-2 col-4 mx-auto" name="Agregar" type="submit" value="Agregar">

                <input type="reset" class="btn d-grid gap-2 col-4 mx-auto btn-danger mt-6 " value="Limpiar">
            </form>
        </div>
    </div><!--End Div Card-->

    <!--Start Our Table-->
    <div class="container bg-light">
        <h1 class="text-center">Listas de Producto</h1>
        <table class="table">
            <thead class="table-dark">
                <tr>   
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Stock</th>
                    <th scope="col">PrecioVenta</th>
                    <th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "ConexionBD.php";

                $conex = Conectar();
                $sql2 = "SELECT * FROM producto";
                $query2 = mysqli_query($conex, $sql2);


                while ($fila = mysqli_fetch_array($query2)) {
                ?>
                    <tr>
                        <td><?php echo $fila['Nombre'] ?></td>
                        <td><?php echo $fila['Descripcion'] ?></td>
                        <td><?php echo $fila['Stock'] ?></td>
                        <td><?php echo $fila['PrecioVenta'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="Editar_Producto.php?id=<?php echo $fila['Producto_id']?>">Editar</a>
                            <a href="Eliminar_Producto.php?id=<?php echo $fila['Producto_id']?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                Desconectar($conex);
                ?>
            </tbody>
        </table>
    </div>


</body>
</html>
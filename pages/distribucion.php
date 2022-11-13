<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require("../partials/head.php"); ?>
</head>
<body class="bg-main">

<?php 
    
    require("../partials/header.php");
    require_once("../controller/index.php");
    
    $data = listAllKits();

    $processedData = listAllProcessedKits();

?>

<div class="container mt-5">
<div class="card shadow-sm">
    <div class="card-header text-center p-2 text-white bg-dark">
        <h4 class="card-title"><i class="bi bi-basket-fill"></i> 450 productos registrados actualmente</h4>
    </div>
    <div class="card-body text-center">
        <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="?nuevo=registro" role="button">Generar distribución <i class="bi bi-plus"></i></a>
    </div>
</div>
</div>

<div class="container-fluid mt-5 mb-5">

<div style="width: max-content;" class="p-2 px-4 text-center bg-warning rounded-3">
    <h5><i class="bi bi-robot"></i> Propuestas de distribucion generadas</h5>
</div>

<table id="table_id" class="display table mt-4 mb-4 table-bordered">
    <thead class="table-dark text-center">
        <tr>
            <th>ID</th>
            <th>Originado por</th>
            <th>Productos</th>
            <th>Total</th>
            <th>Fecha de Creación</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value) { ?>
            <tr class="text-center align-middle">
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['usuario']; ?></td>
                <td><?php echo $value['productos']; ?></td>
                <td>S/. <?php echo $value['total']; ?></td>
                <td><?php echo $value['fechaCreacion']; ?></td>
                <td class="d-flex justify-content-center gap-2">
                    <a class="btn btn-warning btn-sm" href="?id=<?php echo $value['id_producto']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Autorizar <i class="bi bi-check2-square"></i></a>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ver Detalles</button>
                    <a class="btn btn-danger btn-sm" href="?id=<?php echo $value['id_producto']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<div style="width: max-content;" class="p-2 px-4 text-center bg-warning rounded-3">
    <h5><i class="bi bi-bag-check-fill"></i> Historial de propuestas procesada</h5>
</div>

<table id="table_id" class="display table mt-4 table-bordered">
    <thead class="table-dark text-center mx-auto">
        <tr class="text-center align-middle">
            <th>ID</th>
            <th>Originado por</th>
            <th>Productos</th>
            <th>Total</th>
            <th>Fecha de Creación</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($processedData as $value) { ?>
            <tr class="text-center align-middle">
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['usuario']; ?></td>
                <td><?php echo $value['productos']; ?></td>
                <td>S/. <?php echo $value['total']; ?></td>
                <td><?php echo $value['fechaCreacion']; ?></td>
                <td class="d-flex justify-content-center gap-4">
                    <button class="btn btn-primary">Ver Detalles</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detalles del Kit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="productos" class="form-label"><b>Generado por</b></label><br>
                    <label for="productos" class="form-label">Renato Gutiérrez</label>
                </div>
                <div class="col">
                    <label for="productos" class="form-label"><b>Fecha de Creación</b></label><br>
                    <label for="productos" class="form-label">2022-11-12</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="productos" class="form-label"><b>Productos</b></label><br>
                    <label for="productos" class="form-label">3</label>
                </div>
                <div class="col">
                    <label for="productos" class="form-label"><b>Total</b></label><br>
                    <label for="productos" class="form-label">S/. 21.90</label>
                </div>
            </div>
        </div>
      </div>
    <div class="modal-footer">
        <table id="table_id" class="display table pt-4 table-bordered">
            <thead class="table-dark text-center mx-auto">
                <tr>
                    <th>Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center align-middle">
                    <td>Bolsa de Azúcar</td>
                    <td>S/. 2.50</td>
                    <td>3</td>
                    <td>S/. 7.50</td>
                </tr>
                <tr class="text-center align-middle">
                    <td>Tarro de leche Gloria</td>
                    <td>S/. 5.60</td>
                    <td>2</td>
                    <td>S/. 11.20</td>
                </tr>
                <tr class="text-center align-middle">
                    <td>Bolsa de Arroz</td>
                    <td>S/. 3.20</td>
                    <td>1</td>
                    <td>S/. 3.20</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-house-heart-fill"></i> Solicitar Distribución</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="/softkit/controller/index.php">   
                <div class="modal-body row gap-3">
                    <div class="form-group">
                        <label for="productos" class="form-label">Productos por Kit</label>
                        <input type="number" class="form-control" id="productos" name="productos" required>
                    </div>  
                    <div class="form-group">
                        <label for="cantidad" class="form-label">Cantidad de Productos</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                    </div>  
                    <div class="form-group">
                        <label for="propuesta" class="form-label">Cantidad de Propuestas</label>
                        <input type="number" class="form-control" id="propuesta" name="propuesta" required>
                    </div> 
                    <!--<div class="form-group">
                        <label for="proveedorKit" class="form-label">Elegir Producto</label>
                        <select id="proveedorKit" name="proveedorKit" class="form-select" required>
                        <option selected value="">Selecciona</option>
                        <option>Leche Gloria</option>
                        <option>Bolsa de Azúcar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precioProducto" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="precioProducto" name="precioProducto" required>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom"></div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-outline-success">Añadir Producto</button>
                    </div>-->
                <div class="modal-footer">
                    <input type="hidden" value="ok" name="register-product">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar Datos <i class="bi bi-check-lg"></i></button>
                </div>
            </form>    
        </div>
    </div>
</div>  
</body>
</html>
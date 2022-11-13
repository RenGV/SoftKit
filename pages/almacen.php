<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require("../partials/head.php"); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
</head>
<body class="bg-main">

<?php

    require("../partials/header.php");
    require_once("../controller/index.php");
    
    $data = listAllProducts();

?>

<div class="container-fluid mt-5 d-flex justify-content-between">
    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="?nuevo=registro" role="button">Nuevo Registro <i class="bi bi-plus"></i></a>
    <button style="display:none;" id="btnNew" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
    <button type="button" class="btn btn-warning">Exportar Datos (.csv) <i class="bi bi-file-earmark-spreadsheet-fill"></i></button>
</div>

<div class="container-fluid mt-5 mb-5">
<table id="table_id" class="display table pt-4 table-bordered">
    <thead class="table-dark text-center mx-auto">
        <tr>
            <th>Descripción</th>
            <th>Precio Unitario</th>
            <th>Stock</th>
            <th>Fecha Ingreso</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value) { ?>
            <tr class="text-center align-middle">
                <td><?php echo $value['descripcion']; ?></td>
                <td>S/. <?php echo $value['precioUnitario']; ?></td>
                <td><?php echo $value['stock']; ?></td>
                <td><?php echo $value['fechaIngreso']; ?></td>
                <td class="d-flex justify-content-center gap-3">
                    <a href="?id=<?php echo $value['id_producto']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar <i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalDel">Eliminar <i class="bi bi-trash3"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>



<div class="modal fade" id="exampleModalDel" tabindex="-1" aria-labelledby="exampleModalDel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el producto seleccionado?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="bi bi-info-circle-fill"></i> Recuerda: La información guardada aún no ha sido </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Eliminar Producto <i class="bi bi-trash3"></i></button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-house-heart-fill"></i> Almacen Fundacion Calma</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="/softkit/controller/index.php">   
                <div class="modal-body row gap-3">
                    <div class="form-group">
                        <label for="nombreProducto" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
                    </div>
                    <div class="form-group">
                        <label for="precioProducto" class="form-label">Precio de compra</label>
                        <input type="number" class="form-control" id="precioProducto" name="precioProducto" required>
                    </div>                
                    <div class="form-group">
                        <label for="descripcionProducto" class="form-label">Descripción detallada</label>
                        <input type="text" class="form-control" id="descripcionProducto" name="descripcionProducto" required>
                    </div>
                    <div class="form-group">
                        <label for="proveedorKit" class="form-label">Proveedor Seleccionado</label>
                        <select id="proveedorKit" name="proveedorKit" class="form-select" required>
                        <option selected value="">Selecciona</option>
                        <option value="INSUMOS & SOLUCIONES S.A.C.">INSUMOS & SOLUCIONES S.A.C.</option>
                        <option value="AMERICAN CATERING S.A.C.">AMERICAN CATERING S.A.C.</option>
                        <option value="CIMPO S.R.L.">CIMPO S.R.L.</option>
                        <option value="AMERICAN CATERING S.A.C.">AMERICAN CATERING S.A.C.</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stockProductos" class="form-label">Stock Ingresado</label>
                        <input type="number" class="form-control" id="stockProductos" name="stockProductos" required>
                    </div>
                    <div class="form-group">
                        <label for="codigoCompra" class="form-label">Código de Compra</label>
                        <input type="text" class="form-control" id="codigoCompra" name="codigoCompra" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaIngreso" class="form-label">Fecha de Ingreso</label>
                        <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaVencimiento" class="form-label">Fecha de Vencimiento</label>
                        <input type="date" class="form-control" id="fechaVencimiento" name="fechaVencimiento" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="ok" name="register-product">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar Datos <i class="bi bi-check-lg"></i></button>
                </div>
            </form>    
        </div>
    </div>
</div>  



<script>

$(document).ready( function () {

    const urlParams = new URLSearchParams(window.location.search);
    var producto = urlParams.get('nuevo');

    if (producto == 'registro'){
        $("#btnNew").click();
    }

    $('#table_id').DataTable({

    });


} );

</script>
</body>
</html>
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
                    <label for="productos" class="form-label"><?php echo $kitDetails['usuario']; ?></label>
                </div>
                <div class="col">
                    <label for="productos" class="form-label"><b>Fecha de Creación</b></label><br>
                    <label for="productos" class="form-label"><?php echo $kitDetails['fechaCreacion']; ?></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="productos" class="form-label"><b>Productos</b></label><br>
                    <label for="productos" class="form-label"><?php echo $kitDetails['productos']; ?></label>
                </div>
                <div class="col">
                    <label for="productos" class="form-label"><b>Total</b></label><br>
                    <label for="productos" class="form-label">S/. <?php echo $kitDetails['total']; ?></label>
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
                <?php foreach ($kitDetails as $value) { ?>
                    <tr class="text-center align-middle">
                        <td><?php echo $value['descripcion']; ?></td>
                        <td><?php echo $value['precioUnitario']; ?></td>
                        <td><?php echo $value['productos']; ?></td>
                        <td><?php echo $value['subtotal']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
  </div>
</div>
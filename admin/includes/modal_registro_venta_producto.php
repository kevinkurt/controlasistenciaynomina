<!-- Add -->
<div class="modal fade" id="addnew2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Agregar Producto</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="agregar_venta_productos.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="firstname" class="col-sm-3 control-label">Id producto</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="cantidad" name="Cantidad" required>
            </div>
          </div>
          <div class="form-group">
            <label for="position" class="col-sm-3 control-label">Cargo</label>

            <div class="col-sm-9">
              <select class="form-control" id="descripcion" name="descripcion" required>
                <option value="" selected>- Seleccionar -</option>
                <?php
                $sql = "SELECT * FROM productos";
                $query = $conn->query($sql);
                while ($prow = $query->fetch_assoc()) {
                  echo "
                    <option value='" . $prow['id_producto'] . "'>" . $prow['descripcion'] . "</option>
                     ";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>
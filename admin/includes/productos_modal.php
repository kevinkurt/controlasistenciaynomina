<?php
  include '../timezone.php';
  $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
?>
 
<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Agregar Producto</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="productos_agregar.php" enctype="multipart/form-data">
              <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Id producto</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="id_product" name="id_producto" required>
                  	</div>
                </div>
              <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Descripcion producto</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="description" name="descripcion" required>
                  	</div>
                </div>  
              <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Cantidad</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="quantity" name="Cantidad" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Valor costo</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="value_cost" name="valor_costo" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="address" class="col-sm-3 control-label">Valor venta</label>

                  	<div class="col-sm-9">
                    <input type="text" class="form-control" id="value_seller" name="valor_venta" required>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Modificar productos<span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="productos_editar.php">
            		<input type="hidden" class="empid" name="id_producto">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Descripcion producto</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_description" name="descripcion" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Cantidad</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_quantity" name="Cantidad">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_address" class="col-sm-3 control-label">Valor costo</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="valor_costo" id="edit_value_cost"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_contact" class="col-sm-3 control-label">Valor venta</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_value_seller" name="valor_venta">
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="id_empleado"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_delete.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>ELIMINAR EMPLEADO</p>
	                	<h2 class="bold del_employee_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Eliminar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- liquidar empleado -->
<div class="modal fade" id="addnew1">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Liquidar Empleado</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
              <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Tipo documento</label>
                    <div class="col-sm-9"> 
                      <select class="form-control" id="tipo_doc" name="tipo_doc" required>
                        <option value="" selected>- Seleccionar -</option>
                        <option value="cedula ciudadania">CC</option>
                        <option value="cedula extranjeria">CE</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                     <label for="firstname" class="col-sm-3 control-label">numero de documento</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" id="employee_id" name="id_empleado" required>
                     </div>
                </div>  
                <div class="form-group">
                     <label for="firstname" class="col-sm-3 control-label">rango de fechas a liquidar</label>
                     <div class="col-sm-9">  
                     <div class="input-group">  
                     <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                     </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from.' - '.$range_to; ?>">
                  </div>
                  </div>
                </div>
              
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="glyphicon glyphicon-print"></i> Desprendible de pago </button>
            	</form>
          	</div>
        </div>
    </div>
</div>

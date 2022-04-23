<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Agregar Tiempo Extra</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="overtime_add.php">
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">ID Empleado</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="employee" name="employee" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Fecha</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="date" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="hours" class="col-sm-3 control-label">No. de Horas</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="hours" name="hours">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="mins" class="col-sm-3 control-label">No. de Minutos</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="mins" name="mins">
                  	</div>
                </div>
                 <div class="form-group">
                    <label for="rate" class="col-sm-3 control-label">Promedio</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="rate" name="rate" required>
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





     
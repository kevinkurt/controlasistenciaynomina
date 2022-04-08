<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Agregar Empleado</b></h4>
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
                  	<label for="firstname" class="col-sm-3 control-label">Nombre</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="nombres" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Apellido</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="apellidos" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="address" class="col-sm-3 control-label">Dirección</label>

                  	<div class="col-sm-9">
                      <textarea class="form-control" id="address" name="direccion"></textarea>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="datepicker_add" class="col-sm-3 control-label">Fecha de Nacimiento</label>

                  	<div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="fecha_nacto">
                      </div>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Información de Contacto</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="info_contacto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Género</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" id="gender" name="genero" required>
                        <option value="" selected>- Seleccionar -</option>
                        <option value="Masculino">Hombre</option>
                        <option value="Femenino">Mujer</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="position" class="col-sm-3 control-label">Cargo</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="position" name="id_cargo" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM cargos";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id_cargo']."'>".$prow['descripcion']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="schedule" class="col-sm-3 control-label">Horario</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="schedule" name="id_horario" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM horario";
                          $query = $conn->query($sql);
                          while($srow = $query->fetch_assoc()){
                            echo "
                              <option value='".$srow['id_horario']."'>".$srow['Hora_ingreso'].' - '.$srow['Hora_salida']."</option>
                            ";
                          }
                        ?>
                      </select>
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
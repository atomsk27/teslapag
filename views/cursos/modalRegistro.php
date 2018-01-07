<div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role='document'>
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h2 class="text-center">Inscripciones</h2>
            </div>
            <div class="modal-body">
                <form action="../../controller/registro.php?tipo=estudiante" method="post" id='form-estudiantes' name="form-estudiantes">
                    <h3>Datos del participante</h3>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nombres">Nombres</label>
                            <input type="text" class='form-control' id='nombres' placeholder="Nombres" name='nombres' required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class='form-control' id='apellidos' placeholder="Apellidos" name='apellidos' required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="email">E-mail</label>
                            <input type="email" class='form-control' id='email' placeholder="E-Mail" name='email' required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="colegio">Colegio</label>
                            <input type="text" class='form-control' id='colegio' placeholder="Colegio" name='colegio'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="edad">Edad</label>
                            <input type="number" class='form-control' id='edad' placeholder="Edad" name='edad'>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="dni">DNI</label>
                            <input type="number" class='form-control' id='dni' placeholder="DNI" name='dni' maxlength="8" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="Curso">Curso</label>
                                  <select class="form-control" id="Curso" name='Curso' placeholder='Curso'>
                                      <?php
                                        while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
                                      ?>
                                    <option>
                                        <?php
                                        echo $row['nombreCurso'] ?>
                                    </option>
                                      <?php }
                                      ?>
                                  </select>
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" value='Enviar' id='enviar' class='btn-default btn this-btn' >
                </form>
            </div>
        </div>
    </div>
</div>

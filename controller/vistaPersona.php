<?php
    require_once 'connection.php';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die('La conexion fallo'.$conn->connect_error);
    }
    $idRol = intval($_GET['q']);
    $count = 0;
    $sql = 'SELECT * FROM vistaPersona WHERE idRol = "'.$idRol.'"';
    $result = $conn->query($sql);
 ?>
 <ul class="nav nav-tabs" style="margin-bottom: 15px;">
     <li class="active"><a href="#new" data-toggle="tab">New</a></li>
     <li><a href="#list" data-toggle="tab">List</a></li>
 </ul>

 <div class="tab-pane fade active in" id="new">
     <div class="container-fluid">
         <div class="row">
             <div class="col-xs-12 col-md-10 col-md-offset-1">
                 <form action="../controller/insert_data.php?idRol=<?php echo $idRol;?>" method="post">
                     <div class="form-group label-floating">
                       <label class="control-label">Usuario</label>
                       <input class="form-control" type="text" name='user' required>
                     </div>
                     <div class="form-group label-floating">
                       <label class="control-label">Password</label>
                       <input class="form-control" type="password" name='password' required>
                     </div>
                     <div class="form-group label-floating">
                       <label class="control-label">Nombres</label>
                       <input class="form-control" type="text" name='nombrePersona' required>
                     </div>
                     <div class="form-group label-floating">
                       <label class="control-label">Apellido Paterno</label>
                       <input class="form-control" type="text" name = 'apellidoPaterno' required>
                     </div>
                     <div class="form-group label-floating">
                       <label class="control-label">Apellido Materno</label>
                       <input class="form-control" type="text" name="apellidoMaterno" required>
                     </div>
                     <div class="form-group label-floating">
                       <label class="control-label">DNI</label>
                       <input class='form-control' type="number" min="10000000" max="99999999" name="dni" required>
                     </div>
                     <div class="form-group label-floating">
                       <label class="control-label">Email</label>
                       <input class="form-control" type="email" name="email">
                     </div>
                     <div class="form-group label-floating">
                       <label class="control-label">Telefono</label>
                       <input class="form-control" type="number" name="numero">
                     </div>
                     <div class="form-group label-floating">
                       <label class="control-label">Telefono Alternativo</label>
                       <input class="form-control" type="number" name="numeroOpcional">
                     </div>
                     <div class="form-group label-floating">
                       <label class="control-label">Sexo</label>
                       <div class="sexo" >
                           Masculino
                           <input class="form-control" type="radio" value='1' name="sexo">
                       </div>
                       <div class="sexo" >
                           Femenino
                           <input class="form-control" type="radio" value='2' name="sexo">
                       </div>
                     </div>
                     <div class="form-group label-floating">
                       <label class="control-label">Direccion</label>
                       <input class="form-control" type="text" name="direccion">
                     </div>
                     <!--
                     <div class="form-group">
                       <label class="control-label">Photo</label>
                       <div>
                         <input type="text" readonly="" class="form-control" placeholder="Browse...">
                         <input type="file" >
                       </div>
                     </div>
                     -->
                     <p class="text-center">
                         <button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Save</button>
                     </p>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <div class="tab-pane fade" id="list">
     <div class="table-responsive">
         <table class="table table-hover text-center">
             <thead>
                 <tr>
                     <th class="text-center">#</th>
                     <th class="text-center">Nombres</th>
                     <th class="text-center">Apellido Paterno</th>
                     <th class="text-center">Apellido Materno</th>
                     <th class="text-center">DNI</th>
                     <th class="text-center">Email</th>
                     <th class="text-center">Phone</th>
                     <th class="text-center">Fecha Nacimiento</th>
                 </tr>
             </thead>
             <?php
             while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                 $count++;

             ?>
             <tbody>
                 <tr>
                     <td>
                         <?php echo $count; ?>
                     </td>
                     <td>
                         <?php echo $row['nombrePersona']; ?>
                     </td>
                     <td>
                         <?php echo $row['apellidoPaterno']; ?>
                     </td>
                     <td>
                         <?php echo $row['apellidoMaterno']; ?>
                     </td>
                     <td>
                         <?php echo $row['dni']; ?>
                     </td>
                     <td>
                         <?php echo $row['email']; ?>
                     </td>
                     <td>
                         <?php echo $row['numero']; ?>
                     </td>
                     <td>
                         <?php
                         if ($row['fechaNacimiento'] == '1000-01-01') {
                             echo '';
                         }
                         else {
                             echo $row['fechaNacimiento'];
                         }
                         ?>
                     </td>
                     <!--
                         <td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
                         <td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
                     -->
                 </tr>
             </tbody>
             <?php }  ?>
         </table>
         <ul class="pagination pagination-sm">
             <li class="disabled"><a href="#!">«</a></li>
             <li class="active"><a href="#!">1</a></li>
             <li class="disabled"><a href="#!">2</a></li>
             <li class="disabled"><a href="#!">3</a></li>
             <li class="disabled"><a href="#!">4</a></li>
             <li class="disabled"><a href="#!">5</a></li>
             <li class="disabled"><a href="#!">»</a></li>
         </ul>
     </div>
 </div>

<?php
    require_once 'connection.php';

    $conn = new mysqli ($db_host, $db_user, $db_password, $db_name);

    $idCurso = intval($_GET['q']);
    $count = 0;
    $sql = 'SELECT * FROM vistaCursos WHERE idCurso ="'.$idCurso.'"';

    $result = $conn->query($sql);
    $first_row = $result->fetch_array(MYSQLI_ASSOC);

    $sql_alt = 'SELECT * FROM registro WHERE curso ="'.$first_row['nombreCurso'].'"';

    $newResult = $conn->query($sql_alt);
 ?>

 <div class="row">
     <div class="col-sm-12 col-sm-offset-0">
         <h4 class="" style='text-align:center;'>
             <table class="table table-hover text-center">
                 <thead>
                     <tr>
                         <th class="text-center">#</th>
                         <th class="text-center">Nombres</th>
                         <th class="text-center">Apellidos</th>
                         <th class="text-center">E-mail</th>
                         <th class="text-center">Colegio</th>
                         <th class="text-center">Edad</th>
                         <th class="text-center">DNI</th>
                         <th class="text-center">Curso</th>
                         <th class="text-center">Celular</th>
                     </tr>
                 </thead>
                 <?php
                 while ($row = $newResult->fetch_array(MYSQLI_ASSOC)) {
                     $count++;
                 ?>
                 <tbody>
                     <tr>
                         <td>
                             <?php echo $count; ?>
                         </td>
                         <td>
                             <?php echo $row['nombres']; ?>
                         </td>
                         <td>
                             <?php echo $row['apellidos']; ?>
                         </td>
                         <td>
                             <?php echo $row['email']; ?>
                         </td>
                         <td>
                             <?php echo $row['colegio']; ?>
                         </td>
                         <td>
                             <?php echo $row['edad']; ?>
                         </td>
                         <td>
                             <?php echo $row['dni']; ?>
                         </td>
                         <td>
                             <?php echo $row['curso']; ?>
                         </td>
                         <td>
                             <?php echo $row['celularPadre']; ?>
                         </td>
                     </tr>
                 </tbody>
                 <?php }  ?>
             </table>
         </h4>
     </div>

 </div>

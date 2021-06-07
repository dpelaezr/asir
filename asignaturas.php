<?php 
    $page = explode ('/', $_SERVER['PHP_SELF']);
        $page = end($page);
    if ($page!=='index.php') {
        if ($page==$page) {
            $page = explode ('.', $page);
        header('Location: index.php?page='.$page[0]);
        }
    }
?>
<h1 class="principal"><i class="fas fa-book-reader"></i>  Asignaturas</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Lista de Asignaturas</span></li>
  </ol>
</nav>

<?php if(isset($_GET['delete']) || isset($_GET['edit'])) {
    ?>
  <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
    <div class="toast-header">
      <strong class="mr-auto">Insertar</strong>
      <small><?php echo date('d-M-Y'); ?></small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>

<?php } ?>
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre de la Asignatura</th>
      <th scope="col">DNI del Profesor</th>
      <th scope="col">Año del Ciclo</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>

        <?php 
      $query=mysqli_query($dbconfig,'SELECT * FROM `asignaturas` ORDER BY `asignaturas`.`id`;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { 
    ?>
      <tr>

        <?php 
        echo '<td>'.$i.'</td>
          <td>'.ucwords($result['nombre_asig']).'</td>
          <td>'.$result['dni_prof'].'</td>
          <td>'.$result['aciclo'].'</td>
          <td>
            <a class="btn btn-xs" href="index.php?page=editarasig&id='.base64_encode($result['id']).'&photo=">
              <i class="fa fa-edit"></i></a>

             &nbsp; <a class="btn btn-xs" "href="index.php?page=eliminarasig&id='.base64_encode($result['id']).'&img=">
             <i class="fa fa-trash-alt"></i></a></td>';
        ?>
      </tr>  

     <?php $i++;} ?>
 </tbody>
</table>

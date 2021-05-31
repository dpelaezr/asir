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
<h1 class="principal"><i class="fas fa-chalkboard-teacher"></i>  Profesores</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Todos los profesores</span></li>
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
    <div class="toast-body">
      <?php 

      if (isset($_GET['delete'])) {
          if ($_GET['delete']=='success') {
            echo "<p style='color: green; font-weight: bold;'>Profesor eliminado!</p>";
          }  
        }
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='error') {
            echo "<p style='color: red'; font-weight: bold;>Profesor no eliminado.</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='success') {
            echo "<p style='color: green; font-weight: bold; '>Profesor actualizado!</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='error') {
            echo "<p style='color: red; font-weight: bold;'>Actualización erronea.</p>";
          }  
        }
      ?>
    </div>
  </div>

<?php } ?>
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">DNI</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Asignatura</th>
      <th scope="col">Telefono</th>
      <th scope="col">Email</th>
      <th scope="col">Imagen</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>

        <?php 
      $query=mysqli_query($dbconfig,'SELECT * FROM `profesores` ORDER BY `profesores`.`dni` DESC;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { 
    ?>
      <tr>

        <?php 
        echo '<td>'.$i.'</td>
          <td>'.ucwords($result['dni']).'</td>
          <td>'.ucwords($result['nombre']).'</td>
          <td>'.$result['apellidos'].'</td>
          <td>'.ucwords($result['asignatura']).'</td>
          <td>'.ucwords($result['telefono']).'</td>
          <td>'.$result['email'].'</td>
          <td><img src="img/'.$result['img'].'" height="50px"></td>
          <td>
            <a class="btn btn-xs" href="index.php?page=editarprof&id='.base64_encode($result['dni']).'&photo='.base64_encode($result['img']).'">
              <i class="fa fa-edit"></i></a>

             &nbsp; <a class="btn btn-xs" onclick="javascript:confirmationDelete($(this));return false;" href="index.php?page=eliminar&dni='.base64_encode($result['dni']).'&img='.base64_encode($result['img']).'">
             <i class="fa fa-trash-alt"></i></a></td>';
        ?>
      </tr>  

     <?php $i++;} ?>
 </tbody>
</table>
<script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('¿Quieres eliminarlo?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>
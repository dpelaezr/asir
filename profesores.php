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
      $query=mysqli_query($dbconfig,'SELECT * FROM `profesores` ORDER BY `profesores`.`dni`;');
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
            <a class="btn btn-xs" href="index.php?page=editarprof&dni='.base64_encode($result['dni']).'&img='.base64_encode($result['img']).'">
              <i class="fa fa-edit"></i></a>

             &nbsp; <a class="btn btn-xs" " href="index.php?page=eliminarprof&dni='.base64_encode($result['dni']).'&img='.base64_encode($result['img']).'">
             <i class="fa fa-trash-alt"></i></a></td>';
        ?>
      </tr>  

     <?php $i++;} ?>
 </tbody>
</table>

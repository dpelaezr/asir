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

<h1 class="principal"><i class="fas fa-book-reader"></i>  Administradores</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Lista de Administradores</span></li>
  </ol>
</nav>

<?php if(isset($_GET['delete']) || isset($_GET['edit'])) {
    ?>

<?php } ?>

<div class="table-responsive">
  <table class="table">
  <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre de Usuario</th>
      <th scope="col">Email</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Foto</th>
      <th scope="col">Estado</th>
      <th scope="col">Opciones</th>

      <?php 
      $query=mysqli_query($dbconfig,'SELECT * FROM `admin` ORDER BY `admin`.`username`;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { 
    ?>
      <tr>

        <?php 
        echo '<td>'.$i.'</td>
          <td>'.ucwords($result['username']).'</td>
          <td>'.$result['email'].'</td>
          <td>'.$result['nombre'].'</td>
	        <td>'.$result['apellidos'].'</td>
          <td><img src="img/'.$result['img'].'" height="50px"></td>
          <td>'.$result['estado'].'</td>
          <td>
            <a class="btn btn-xs" href="index.php?page=editaradmin&id='.base64_encode($result['id']).'&img='.base64_encode($result['img']).'">
              <i class="fa fa-edit"></i></a>
            
            &nbsp; <a class="btn btn-xs" " href="index.php?page=eliminaradmin&id='.base64_encode($result['id']).'&img='.base64_encode($result['img']).'">
              <i class="fa fa-trash-alt"></i></a></td>';
          
        ?>
    </tr>

    <?php $i++;} ?>
  </table>
</div>

<div class="tabla">
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre de Usuario</th>
      <th scope="col">Email</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>

        <?php 
      $query=mysqli_query($dbconfig,'SELECT * FROM `admin` ORDER BY `admin`.`username`;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { 
    ?>
      <tr>

        <?php 
        echo '<td>'.$i.'</td>
          <td>'.ucwords($result['username']).'</td>
          <td>'.$result['email'].'</td>
          <td>'.$result['nombre'].'</td>
          <td>'.$result['apellidos'].'</td>
          <td>'.$result['estado'].'</td>
          <td>
	      </td>';
        ?>
      </tr>  

     <?php $i++;} ?>
 </tbody>
</table>
</div>
<br>
<a class="botonperfil" href="index.php?page=añadiradmin&id"><i class="fa fa-plus"></i> Añadir Administrador</a>
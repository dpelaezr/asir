<?php
    $page = explode('/', $_SERVER['PHP_SELF']);
        $page = end($page);
        if ($page!=='index.php') {
            if ($page==$page) {
                $page = explode ('.', $page);
            header('Location: index.php?page='.$page[0]);
            }
        }
?>

<h1 class="principal"><i class="fas fa-users"></i>  Administradores</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Administradores</span></li>
  </ol>
</nav>

<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>

  <?php 
      $query=mysqli_query($dbconfig,'SELECT * FROM `admin`');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo '<td>'.$i.'</td>
          <td>'.ucwords($result['nombre']).'</td>
          <td>'.$result['email'].'</td>
          <td>'.ucwords($result['username']).'</td>
          <td><img src="img/'.$result['img'].'" height="50px"></td>
          <td>'.$result['estado'].'</td>';?>
      </tr>  
     <?php $i++;} ?>
  </tbody>
</table>

<script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('¿Quieres eliminar este administrador?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>
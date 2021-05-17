<?php 
$user=  $_SESSION['user_login'];
  $page = explode('/', $_SERVER['PHP_SELF']);
    $page = end($page);
    if ($page!=='index.php') {
      if ($page==$page) {
        $page = explode('.', $page);
       header('Location: index.php?page='.$page[0]);
     }
    }
?>

<h1 class="text-primary"><i class="fas fa-user"></i>  Perfil del Administrador</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Información </a></li>
     <li class="breadcrumb-item active" aria-current="page">Perfil</li>
  </ol>
</nav>

<?php 
  $query = mysqli_query($dbconfig, "SELECT * FROM `admin` WHERE `username` ='$user';");
  $row = mysqli_fetch_array($query);

 ?>

<div class="row">
  <div class="col-sm-6">
    <table class="table table-bordered">
      <tr>
        <td>ID Administrador</td>
        <td><?php echo $row['id']; ?></td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td><?php echo ucwords($row['nombre']); ?></td>
      </tr>
      <tr>
      <td>Apellidos</td>
        <td><?php echo ucwords($row['apellidos']); ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $row['email']; ?></td>
      </tr>
      <tr>
        <td>Username</td>
        <td><?php echo ucwords($row['username']); ?></td>
      </tr>
      <tr>
        <td>Estado</td>
        <td><?php echo ucwords($row['estado']); ?></td>
      </tr>
    </table>
    <a class="btn btn-warning pull-right" href="index.php?page=editaruser&id=<?php echo base64_encode($row['id']); ?>">Editar</a>
  </div>

  <div class="col-sm-6">
    <h3>Foto de Perfil</h3>
    <a href="img/<?php echo $row['img']; ?>">
      <img class="img-thumbnail" id="img" src="img/<?php echo $row['img']; ?>" width="200px">
    </a>

    <?php 
        if (isset($_POST['actualizar'])) {
          unlink('img/'.$row['img']);
          $archivofoto = $_FILES['foto']['tmp_name'];
          $actualizar = $user.date('s-m-y-m-Y').$_FILES['foto']['nombre'];
          if (mysqli_query($dbconfig, "UPDATE `admin` SET `img` = '$actualizar' WHERE `admin`.`username` = '$user';")) {
            move_uploaded_file($archivofoto, 'img/'.$actualizar);
          }else{
            echo "Actualizacion incorrecta.";
          }
        }
     ?><br>
    <form method="POST" enctype="multipart/form-data">
      <input type="file" name="userphoto" required="" id="img"><br>
      <input class="btn btn-info" type="submit" name="actualizar" value="Actualizar Foto">
    </form>
  </div>
</div>
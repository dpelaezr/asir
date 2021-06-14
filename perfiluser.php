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

<h1 class="principal"><i class="fas fa-user"></i>  Perfil del Administrador</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Perfil</span></li>
  </ol>
</nav>

<?php 
  $query = mysqli_query($dbconfig, "SELECT * FROM `admin` WHERE `username` ='$user';");
  $row = mysqli_fetch_array($query);

 ?>

<div class="perfiladmin">
<div>
<div class="col-sm-6">
    <h3 class="profile">Foto de Perfil</h3>
    <a href="img/<?php echo $row['img']; ?>">
      <img class="imgs-thumbnail" id="img" src="img/<?php echo $row['img']; ?>" width="100px">
    </a>

    <?php 
        if (isset($_POST['actualizar'])) {
         /* unlink('img/'.$row['img']); */
          $archivofoto = $_FILES['fotoperfil']['tmp_name'];
          $actualizar = $user.date('s-m-y-m-Y').$_FILES['fotoperfil']['name'];
          if (mysqli_query($dbconfig, "UPDATE `admin` SET `img` = '$actualizar' WHERE `admin`.`username` = '$user';")) {
            move_uploaded_file($archivofoto, 'img/'.$actualizar);
          }else{
            echo "Actualizacion incorrecta.";
          }
        }
     ?><br>
    <form method="POST" enctype="multipart/form-data">
      <input class="photo" type="file" name="fotoperfil" required="" id="img"><br>
      <input class="botonfoto" type="submit" name="actualizar" value="Actualizar Foto">
    </form> <br>
  </div>
  <div class="col-sm-6">
    <table class="table table-bordered">
    <tr>
        <td class="infperf">Username</td>
        <td><?php echo $row['username']; ?></td>
      </tr>
      <tr>
        <td class="infperf">Email</td>
        <td><?php echo $row['email']; ?></td>
      </tr>
      <tr>
        <td class="infperf">Nombre</td>
        <td><?php echo ucwords($row['nombre']); ?></td>
      </tr>
      <tr>
      <td class="infperf">Apellidos</td>
        <td><?php echo ucwords($row['apellidos']); ?></td>
      </tr>
      <tr>
        <td class="infperf">Estado</td>
        <td><?php echo ucwords($row['estado']); ?></td>
      </tr>
    </table>
    <a class="botonperfil" href="index.php?page=editaruser&id=<?php echo base64_encode($row['id']); ?>">Editar</a>
  </div>

</div>
</div>

<div class="perfildesktop">
<div class="row">
  <div class="col-sm-6">
    <table class="table table-bordered">
    <tr>
        <td class="infperf">Username</td>
        <td><?php echo $row['username']; ?></td>
      </tr>
      <tr>
        <td class="infperf">Email</td>
        <td><?php echo $row['email']; ?></td>
      </tr>
      <tr>
        <td class="infperf">Nombre</td>
        <td><?php echo ucwords($row['nombre']); ?></td>
      </tr>
      <tr>
      <td class="infperf">Apellidos</td>
        <td><?php echo ucwords($row['apellidos']); ?></td>
      </tr>
      <tr>
        <td class="infperf">Estado</td>
        <td><?php echo ucwords($row['estado']); ?></td>
      </tr>
    </table>
    <a class="botonperfil" href="index.php?page=editaruser&id=<?php echo base64_encode($row['id']); ?>">Editar</a>
  </div>

  <div class="col-sm-6">
    <h3 class="profile">Foto de Perfil</h3>
    <a href="img/<?php echo $row['img']; ?>">
      <img class="img-thumbnail" id="img" src="img/<?php echo $row['img']; ?>" width="200px">
    </a>

    <?php 
        if (isset($_POST['actualizar'])) {
         /*  unlink('img/'.$row['img']); */
          $archivofoto = $_FILES['fotoperfil']['tmp_name'];
          $actualizar = $user.date('s-m-y-m-Y').$_FILES['fotoperfil']['name'];
          if (mysqli_query($dbconfig, "UPDATE `admin` SET `img` = '$actualizar' WHERE `admin`.`username` = '$user';")) {
            move_uploaded_file($archivofoto, 'img/'.$actualizar);
          }else{
            echo "Actualizacion incorrecta.";
          }
        }
     ?><br>
    <form method="POST" enctype="multipart/form-data">
      <input class="photo" type="file" name="fotoperfil" required="" id="img"><br>
      <input class="botonfoto" type="submit" name="actualizar" value="Actualizar Foto">
    </form>
  </div>
</div>
</div>

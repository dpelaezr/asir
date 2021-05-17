<?php 
  $page = explode('/', $_SERVER['PHP_SELF']);
    $page = end($page);
    if ($page!=='index.php') {
      if ($page==$page) {
        $page = explode('.', $page);
       header('Location: index.php?page='.$page[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);
    
  if (isset($_POST['userupdate'])) {
  	$nombre = $_POST['nombre'];
  	$email = $_POST['email'];


  	$query = "UPDATE `admin` SET `nombre`='$nombre', `email`='$email' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$insertinto['insertsucess'] = '<p style="color: green;">Perfil Actualizado!</p>';
  		header('Location: index.php?page=editaruser&edit=success');
  	}else{
  		header('Location: index.php?page=editaruser&edit=error');
  	}
  }
?>

<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Editar Alumno Información<small class="text-warning"> Editar Alumno</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Información </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=user-profile">Perfil </a></li>
     <li class="breadcrumb-item active" aria-current="page">Editar Perfil</li>
  </ol>
</nav>

<?php
		if (isset($id)) {

			$query = "SELECT  `nombre`, `apellidos`, `email` FROM `admin` WHERE `id`=$id;";
			$result = mysqli_query($dbconfig,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="nombre">Nombre</label>
		    <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $row['nombre']; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="apellidos">Apellidos</label>
		    <input name="apellidos" type="text" class="form-control" id="apellidos" value="<?php echo $row['apellidos']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="email" class="form-control"  id="email" value="<?php echo $row['email']; ?>" required="">
	  	</div>
	  	
	  	<div class="form-group text-center">
		    <input name="userupdate" value="Actualizar Perfil" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>
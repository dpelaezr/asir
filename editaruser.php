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

  if (isset($_POST['update'])) {
  	$email = $_POST['email'];
  	$nombre = $_POST['nombre'];
  	$apellidos = $_POST['apellidos'];
  	
  	$query = "UPDATE `admin` SET `email`='$email',`nombre`='$nombre',`apellidos`='$apellidos' WHERE `id`= $id";
  	if (mysqli_query($dbconfig,$query)) {
  		$datainsert['insertsucess'] = '<p></p>';
	
  		/* header('Location: index.php?page=perfiluser&edit=success'); */
  	}else{
  		header('Location: index.php?page=perfiluser&edit=error');
  	}
  }
?>

<h1 class="principal"><i class="fas fa-user-edit"></i>  Editar Datos del Perfil</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=perfiluser"><span class="inf">Perfil Administrador</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Editar Perfil</span></li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `id`, `email`, `nombre`, `apellidos` FROM `admin` WHERE `id`=$id";
			$result = mysqli_query($dbconfig,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
	 
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
    <div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="nombre">Nombre del Administrador</label>
		    <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $row['nombre']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="apellidos">Apellidos del Administrador</label>
		    <input name="apellidos" type="text" class="form-control" id="apellidos" value="<?php echo $row['apellidos']; ?>" required="">
	  	</div>
		   <br>
	  	<div class="form-group text-center">
		    <input name="update" value="Actualizar" type="submit" class="boton2">
	  	</div>
	 </form>
</div>
</div>
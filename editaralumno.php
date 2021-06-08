<?php 
  $page = explode('/', $_SERVER['PHP_SELF']);
    $page = end($page);
    if ($page!=='index.php') {
      if ($page==$page) {
        $page = explode('.', $page);
       header('Location: index.php?page='.$page[0]);
     }
    }
    
    $dni = base64_decode($_GET['dni']);
    $oldimg = base64_decode($_GET['img']);

  if (isset($_POST['update'])) {
  	$nombre = $_POST['nombre'];
  	$apellidos = $_POST['apellidos'];
  	$aciclo = $_POST['aciclo'];
  	$ciudad = $_POST['ciudad'];
  	$telefono = $_POST['telefono'];
  	$email = $_POST['email'];

  	if (!empty($_FILES['img']['name'])) {
  		 $img = $_FILES['img']['name'];
	  	 $img = explode('.', $img);
		 $img = end($img); 
		 $img = $dni.date('Y-m-d-m-s').'.'.$img;
  	}else{
  		$img = $oldimg;
  	}
  	

  	$query = "UPDATE `alumnos` SET `nombre`='$nombre',`apellidos`='$apellidos',`aciclo`='$aciclo',`ciudad`='$ciudad',`telefono`='$telefono', `email`='$email',`img`='$img' WHERE `dni`= $dni";
  	if (mysqli_query($dbconfig,$query)) {
  		$datainsert['insertsucess'] = '<p></p>';
		if (!empty($_FILES['img']['name'])) {
			move_uploaded_file($_FILES['img']['tmp_name'], 'img/'.$img);
			unlink('img/'.$oldimg);
		}	
  		/* header('Location: index.php?page=alumnos&edit=success'); */
  	}else{
  		header('Location: index.php?page=alumnos&edit=error');
  	}
  }
?>

<h1 class="principal"><i class="fas fa-user-edit"></i>  Editar Datos del Alumno</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Inicio</span> </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=profesores"><span class="inf">Alumnos</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Editar Alumnos</span></li>
  </ol>
</nav>

	<?php
		if (isset($dni)) {
			$query = "SELECT `dni`, `nombre`, `apellidos`, `aciclo`, `ciudad`, `telefono`, `email` FROM `alumnos` WHERE `dni`=$dni";
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
		    <label for="aciclo">Año del Ciclo</label>
		    <select name="aciclo" class="form-control" id="aciclo" required="" value="">
		    	<option value="1" <?= $row['aciclo']=='1'? 'selected':'' ?>>1</option>
		    	<option value="2" <?= $row['aciclo']=='2'? 'selected':'' ?>>2</option>
		    </select>
	  	</div>
		<div class="form-group">
		    <label for="ciudad">Ciudad</label>
		    <input name="ciudad" type="text" class="form-control" id="ciudad" value="<?php echo $row['ciudad']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="telefono">Telefono</label>
		    <input name="telefono" type="text" class="form-control" id="telefono" value="<?php echo $row['telefono']; ?>" placeholder="" required="">
	  	</div>
		<div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="text" class="form-control" id="email" value="<?php echo $row['email']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="img">Foto</label>
		    <input name="img" type="file" class="form-control" id="img">
	  	</div>
		  <br>
	  	<div class="form-group text-center">
		    <input name="update" value="Actualizar" type="submit" class="boton2">
	  	</div>
	 </form>
</div>
</div>
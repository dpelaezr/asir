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
  	$nombre_asig = $_POST['nombre_asig'];
  	$dni_prof = $_POST['dni_prof'];
  	$aciclo = $_POST['aciclo'];
  	
  	$query = "UPDATE `asignaturas` SET `nombre_asig`='$nombre_asig',`dni_prof`='$dni_prof',`aciclo`='$aciclo' WHERE `id`= $id";
  	if (mysqli_query($dbconfig,$query)) {
  		$insertdato['insertsucess'] = '<p></p>';
	
  		/*header('Location: index.php?page=asignaturas&edit=success');*/
  	}else{
  		header('Location: index.php?page=asignaturas&edit=error');
  	}
  }
?>

<h1 class="principal"><i class="fas fa-user-edit"></i>  Editar Datos de Asignaturas</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Inicio</span> </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=alumnos"><span class="inf">Asignaturas</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Editar Asignaturas</span></li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `id`, `nombre_asig`, `dni_prof`, `aciclo` FROM `asignaturas` WHERE `id`=$id";
			$result = mysqli_query($dbconfig,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="nombre_asig">Nombre de la Asignatura</label>
		    <input name="nombre_asig" type="text" class="form-control" id="nombre_asig" value="<?php echo $row['nombre_asig']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="dni_prof">DNI del Profesor</label>
		    <input name="dni_prof" type="text" class="form-control" id="dni_prof" value="<?php echo $row['dni_prof']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="aciclo">Año del Ciclo</label>
		    <select name="aciclo" class="form-control" id="aciclo" required="" value="">
		    	<option value="1" <?= $row['aciclo']=='1'? 'selected':'' ?>>1</option>
		    	<option value="2" <?= $row['aciclo']=='2'? 'selected':'' ?>>2</option>
		    </select>
	  	</div>
		  <br>
	  	<div class="form-group text-center">
		    <input name="update" value="Actualizar" type="submit" class="boton2">
	  	</div>
	 </form>
</div>
</div>
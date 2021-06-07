<?php
    $page = explode('/', $_SERVER['PHP_SELF']);
        $page = end($page);
    if ($page!=='index.php') {
        if ($page==$page) {
        $page = explode('.', $page);
    header ('Location: index.php?page='.$page[0]);
    }
}

if (isset($_POST['añadir'])) {
    $id = $_POST['id'];
    $nombre_asig = $_POST['nombre_asig'];
    $dni_prof = $_POST['dni_prof'];
    $aciclo = $_POST['aciclo'];

    $query = "INSERT INTO `asignaturas` (`id`, `nombre_asig`, `dni_prof`, `aciclo`)
    VALUES ('$id', '$nombre_asig', '$dni_prof', '$aciclo');";

    if (mysqli_query($dbconfig, $query)) {
        $insertdato['insertsuccess'] = '<p></p>';
    }else{
        $insertdato['inserterror']= '<p></p>';
    }
}

?>

<h1 class="principal"><i class="fas fa-user-plus"></i>  Añadir Asignatura</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Añadir Asignatura</span></li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($insertdato)) {?>
    </div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
	<div class="form-group">
		    <label for="id">ID</label>
		    <input name="id" type="text" class="form-control" id="id" value="<?= isset($id)? $id: '' ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="nombre_asig">Nombre de la Asignatura</label>
		    <input name="nombre_asig" type="text" class="form-control" id="nombre_asig" value="<?= isset($nombre_asig)? $nombre_asig: '' ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="dni_prof">DNI del Profesor</label>
		    <input name="dni_prof" type="text" class="form-control" id="dni_prof" value="<?= isset($dni_prof)? $dni_prof: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="aciclo">Año de Ciclo</label>
		    <select name="aciclo" class="form-control" id="aciclo" required="">
		    	<option>Selecciona el año</option>
		    	<option value="1">1</option>
		    	<option value="1">2</option>
		    </select>
	  	</div>

	  	<div class="boton">
		    <input name="añadir" value="Agregar Asignatura" type="submit" class="boton2">
	  	</div>
	 </form>
</div>
</div>
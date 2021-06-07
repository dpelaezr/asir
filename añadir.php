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
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $aciclo = $_POST['aciclo'];
    $ciudad = $_POST['ciudad'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $img = explode('.', $_FILES['img']['name']);
    $img = end($img);
	$img = $dni.date('Y-m-d-m-s').'.'.$img;

    $query = "INSERT INTO `alumnos` (`dni`, `nombre`, `apellidos`, `aciclo`, `ciudad`, `telefono`, `email`, `img`)
    VALUES ('$dni', '$nombre', '$apellidos', '$aciclo', '$ciudad', '$telefono', '$email', '$img');";

    if (mysqli_query($dbconfig, $query)) {
        move_uploaded_file($_FILES['img']['tmp_name'], 'img/'.$img);
    }else{
        $datainsert['inserterror']= '<p></p>';
    }
}

?>

<h1 class="principal"><i class="fas fa-user-plus"></i>  Añadir Alumno</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Añadir Alumno</span></li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Agregar Alumno</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
    </div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
	<div class="form-group">
		    <label for="dni">NIE/DNI</label>
		    <input name="dni" type="text" class="form-control" id="dni" value="<?= isset($dni)? $dni: '' ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="nombre">Nombre del Alumno</label>
		    <input name="nombre" type="text" class="form-control" id="nombre" value="<?= isset($nombre)? $nombre: '' ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="apellidos">Apellido del Alumno</label>
		    <input name="apellidos" type="text" class="form-control" id="apellidos" value="<?= isset($apellidos)? $apellidos: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="aciclo">Año de Ciclo Cursado</label>
		    <select name="aciclo" class="form-control" id="aciclo" required="">
		    	<option>Selecciona el año</option>
		    	<option value="1">1</option>
		    	<option value="1">2</option>
		    </select>
	  	</div>
		<div class="form-group">
		    <label for="ciudad">Ciudad</label>
		    <input name="ciudad" type="text" value="<?= isset($ciudad)? $ciudad: '' ; ?>" class="form-control" id="ciudad" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="telefono">Telefono</label>
		    <input name="telefono" type="text" value="<?= isset($telefono)? $telefono: '' ; ?>" class="form-control" id="telefono" required="">
	  	</div>
		<div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="text" value="<?= isset($email)? $email: '' ; ?>" class="form-control" id="email" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="img">Foto</label>
		    <input name="img" type="file" class="form-control" id="img" required="">
	  	</div>
	  	<div class="boton">
		    <input name="añadir" value="Agregar Alumno" type="submit" class="boton2">
	  	</div>
	 </form>
</div>
</div>
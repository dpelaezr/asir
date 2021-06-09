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
    $asignatura = $_POST['asignatura'];
    $ciudad = $_POST['ciudad'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $img = explode('.', $_FILES['img']['name']);
    $img = end($img);
	$img = $dni.date('Y-m-d-m-s').'.'.$img;

    $query = "INSERT INTO `profesores` (`dni`, `nombre`, `apellidos`, `asignatura`, `ciudad`, `telefono`, `email`, `img`)
    VALUES ('$dni', '$nombre', '$apellidos', '$asignatura', '$ciudad', '$telefono', '$email', '$img');";

    if (mysqli_query($dbconfig, $query)) {
        $insertdato['insertsuccess'] = '<p></p>';
        move_uploaded_file($_FILES['img']['tmp_name'], 'img/'.$img);
    }else{
        $insertdato['inserterror']= '<p></p>';
    }
}

?>

<h1 class="principal"><i class="fas fa-user-plus"></i>  Añadir Profesor</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
	 <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=profesores"><span class="inf">Profesores</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Añadir Profesor</span></li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($insertdato)) {?>
    </div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
	<div class="form-group">
		    <label for="dni">NIE/DNI</label>
		    <input name="dni" type="text" class="form-control" id="dni" value="<?= isset($dni)? $dni: '' ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="nombre">Nombre</label>
		    <input name="nombre" type="text" class="form-control" id="nombre" value="<?= isset($nombre)? $nombre: '' ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="apellidos">Apellido</label>
		    <input name="apellidos" type="text" class="form-control" id="apellidos" value="<?= isset($apellidos)? $apellidos: '' ; ?>" required="">
	  	</div>
        <div class="form-group">
		    <label for="asignatura">Asignatura</label>
		    <input name="asignatura" type="text" class="form-control" id="asignatura" value="<?= isset($asignatura)? $asignatura: '' ; ?>" required="">
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
		    <input name="añadir" value="Agregar Profesor" type="submit" class="boton2">
	  	</div>
	 </form>
</div>
</div>
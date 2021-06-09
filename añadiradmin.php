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
	$username = $_POST['username'];
    $password = $_POST['password'];
	$email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $estado = $_POST['estado'];
    

    $img = explode('.', $_FILES['img']['name']);
    $img = end($img);
	$img = $username.date('Y-m-d-m-s').'.'.$img;

    $query = "INSERT INTO `admin` (`username`, `password`, `email`, `nombre`, `apellidos`, `img`, `estado`)
    VALUES ('$username', '$password', '$email', '$nombre', '$apellidos', '$img', '$estado');";

    if (mysqli_query($dbconfig, $query)) {
        $datainsert['insertsuccess']= '<p></p>';
        move_uploaded_file($_FILES['img']['tmp_name'], 'img/'.$img);
    }else{
        $datainsert['inserterror']= '<p></p>';
    }
}

?>

<h1 class="principal"><i class="fas fa-user-plus"></i>  Añadir Administrador</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
	 <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=usuarios"><span class="inf">Administradores</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Añadir Administrador</span></li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
    </div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
	<div class="form-group">
		    <label for="username">Nombre de Usuario</label>
		    <input name="username" type="text" class="form-control" id="username" value="<?= isset($username)? $username: '' ; ?>" required="">
	  	</div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input name="password" type="password" class="form-control" id="password" value="<?= isset($password)? $password: '' ; ?>" required="">
	  	</div>
          <div class="form-group">
		    <label for="email">Email</label>
		    <input name="email" type="email" class="form-control" id="email" value="<?= isset($nombre)? $nombre: '' ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="nombre">Nombre</label>
		    <input name="nombre" type="text" class="form-control" id="nombre" value="<?= isset($nombre)? $nombre: '' ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="apellidos">Apellidos</label>
		    <input name="apellidos" type="text" class="form-control" id="apellidos" value="<?= isset($apellidos)? $apellidos: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="estado">Estado de la cuenta</label>
		    <select name="estado" class="form-control" id="estado" required="">
			<option>Selecciona el estado</option>
		    	<option value="activo">activo</option>
		    	<option value="inactivo">inactivo</option>
		    </select>
	  	</div>
	  	<div class="form-group">
		    <label for="img">Foto</label>
		    <input name="img" type="file" class="form-control" id="img" required="">
	  	</div>
	  	<div class="boton">
		    <input name="añadir" value="Agregar Administrador" type="submit" class="boton2">
	  	</div>
	 </form>
</div>
</div>
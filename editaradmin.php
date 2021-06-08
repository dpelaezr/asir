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
  	$estado = $_POST['estado'];
  	

  	$query = "UPDATE `admin` SET `estado`='$estado' WHERE `id`= $id";
  	if (mysqli_query($dbconfig,$query)) {
  		$datainsert['insertsucess'] = '<p></p>';

  		 /*header('Location: index.php?page=usuarios&edit=success'); */
  	}else{
  		header('Location: index.php?page=usuarios&edit=error');
  	}
  }
?>

<h1 class="principal"><i class="fas fa-user-edit"></i>  Editar Datos del Administrador</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Inicio</span> </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=usuarios"><span class="inf">Administradores</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><span class="inf2">Editar Administrador</span></li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `id`, `estado` FROM `admin` WHERE `id`=$id";
			$result = mysqli_query($dbconfig,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
          <div class="form-group">
		    <label for="estado">Estado</label>
		    <select name="estado" class="form-control" id="estado" required="" value="">
		    	<option value="activo" <?= $row['estado']=='activo'? 'selected':'' ?>>activo</option>
		    	<option value="inactivo" <?= $row['estado']=='inactivo'? 'selected':'' ?>>inactivo</option>
		    </select>
	  	</div>
          <br>
          <div class="form-group text-center">
		    <input name="update" value="Actualizar" type="submit" class="boton2">
	  	</div>
	 </form>
</div>
</div>
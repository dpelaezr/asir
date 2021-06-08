
<?php
/*session_start();*/
if (isset($_SESSION['user_login'])) {
    $id = base64_decode($_GET['id']);
    $img = base64_decode($_GET['img']);

    if(mysqli_query($dbconfig, "DELETE FROM `admin` WHERE `id`= '$id'")) {
            unlink('img/'.$img);
            /*header('Location: index.php?page=usuarios&delete=success');*/
    }else{
		    header('Location: index.php?page=usuarios&delete=error');
	    }
}else{
	    header('Location: login.php');
 }
 ?>

<h1 class="principal"><i class="fas fa-book-reader"></i>  Administradores</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><a href="usuarios.php"><span class="inf2">Lista de Administradores</span></li>
  </ol>
</nav>
<br>

<h1 class="eliminar">Administrador/a Eliminado!</h1>
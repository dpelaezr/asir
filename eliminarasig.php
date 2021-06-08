
<?php
/*session_start();*/
if (isset($_SESSION['user_login'])) {
    $id = base64_decode($_GET['id']);

    if(mysqli_query($dbconfig, "DELETE FROM `asignaturas` WHERE `id`= '$id'")) {
            /*header('Location: index.php?page=asignaturas&delete=success');*/
    }else{
		    header('Location: index.php?page=asignaturas&delete=error');
	    }
}else{
	    header('Location: login.php');
 }
 ?>

<h1 class="principal"><i class="fas fa-book-reader"></i>  Asignaturas</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><a href="asignaturas.php"><span class="inf2">Lista de Asignaturas</span></li>
  </ol>
</nav>
<br>

<h1 class="eliminar">Asignatura Eliminada!</h1>
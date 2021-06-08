
<?php
/*session_start(); */
if (isset($_SESSION['user_login'])) {
    $dni = base64_decode($_GET['dni']);
    $img = base64_decode($_GET['img']);

    if(mysqli_query($dbconfig, "DELETE FROM `profesores` WHERE `dni`= '$dni'")) {
            unlink('img/'.$img);
            /*header('Location: index.php?page=profesores&delete=success'); */
    }else{
		    header('Location: index.php?page=profesores&delete=error');
	    }
}else{
	    header('Location: login.php');
 }
 ?>

<h1 class="principal"><i class="fas fa-book-reader"></i>  Profesores</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php"><span class="inf">Información</span> </a></li>
     <li class="breadcrumb-item active" aria-current="page"><a href="profesores.php"><span class="inf2">Lista de Profesores</span></li>
  </ol>
</nav>
<br>

<h1 class="eliminar">Profesor/a Eliminado!</h1>
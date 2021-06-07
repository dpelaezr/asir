
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
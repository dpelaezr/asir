
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
<?php
session_start();
if (isset($_SESION['user_login'])) {
    $dni = base64_decode($_GET['dni']);
    $img = base64_decode($_GET['img']);

    if(mysqli_query($dbconfig, "DELETE FROM `alumnos` WHERE `dni`= '$dni'")) {
        inlink('img/'.$img);
        header('Location: index.php?=page=alumnos&eliminar=success');
    }else{
		header('Location: index.php?page=alumnos&eliminar=error');
	}
}else{
	header('Location: login.php');
 }

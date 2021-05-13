<?php require_once 'dbconfig.php';

session_start();

if (!isset($_SESSION['user_login'])) {
    header ('Location: login.php');
}
?>

<!doctype html>

<html lang="es">
    <head>

    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

    <body>
    
    <nav class="navbar navbar-light" style="background-color: #0b1627;">
    
    <a class="navbar-brand" href="index.php"><i class="fas fa-chalkboard-teacher"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse justify-content-end" id="navbarSupportedContent">
    <?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($dbconfig,"SELECT * FROM `admin` WHERE `username`='$showuser';"); 
    $showrow=mysqli_fetch_array($haha); ?>
    
<ul class="nav navbar-nav ">
      <li class="nav-item"><i class="fas fa-address-card"> Bienvenido/a <?php echo $showrow['nombre']; ?>!</a></li>
      <li class="nav-item"><a class="nav-link" href="index.php?page=perfiluser"><i class="fa fa-user-plus"></i> Perfil</a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Salir</a></li>
    </ul>
  </div>
    </nav>

    <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php?page=card" class="list-group-item list-group-item-action active">
               <i class="fas fa-chart-bar"></i> Estadisticas
              </a>

              <a href="index.php?page=alumnos" class="list-group-item list-group-item-action">
		<i class="fas fa-user-graduate"></i> Alumnos</a>

              <a href="index.php?page=usuarios" class="list-group-item list-group-item-action">
		<i class="fa fa-users"></i> Usuarios</a>
              
	     <a href="index.php?page=perfiluser" class="list-group-item list-group-item-action">
		<i class="fa fa-user"></i> Perfil</a>
            </div>
          </div>

          <div class="col-md-9">
             <div class="content">
                 <?php 
                   if (isset($_GET['page'])) {
                    $page = $_GET['page'].'.php';
                    }else{
                      $page = 'card.php';
                    }

                    if (file_exists($page)) {
                      require_once $page;
                    }else{
                      require_once '404.php';
                    }
                  ?>
             </div>
        </div>
        </div>  
    </div>
    <div class="clearfix"></div>
    <footer>
      <div class="container">
      <p>Copyright &copy; <?php echo date('Y') ?></p>
      </div>
    </footer>
    </body>
</html>
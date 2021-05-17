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
        <link rel="stylesheet" href="../css/card.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
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
               <i class="fas fa-chart-bar"></i> Inicio
              </a>

        <a href="index.php?page=alumnos" class="list-group-item list-group-item-action">
		<i class="fas fa-user-graduate"></i> Alumnos</a>

        <a href="index.php?page=añadir" class="list-group-item list-group-item-action">
		<i class="fas fa-user-graduate"></i> Agregar Alumno</a>

        <a href="index.php?page=profesores" class="list-group-item list-group-item-action">
		<i class="fas fa-user-graduate"></i> Porfesores</a>

        <a href="index.php?page=añadirprof" class="list-group-item list-group-item-action">
		<i class="fas fa-user-graduate"></i> Agregar Profesor</a>

        <a href="index.php?page=asignaturas" class="list-group-item list-group-item-action">
		<i class="fas fa-user-graduate"></i> Asignaturas</a>

        <a href="index.php?page=añadirprof" class="list-group-item list-group-item-action">
		<i class="fas fa-user-graduate"></i> Agregar Asignatura</a>

        <a href="index.php?page=usuarios" class="list-group-item list-group-item-action">
		<i class="fa fa-users"></i> Administradores</a>
              
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
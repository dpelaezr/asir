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
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gayathri:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=David+Libre&family=Gayathri:wght@100&family=Lekton&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Asap&family=Handlee&family=M+PLUS+Rounded+1c:wght@100;300&display=swap" rel="stylesheet">
      </head>

    <body>
    
    <nav class="navbar navbar-light">
    
    <a class="navbar-brand" href="index.php"></a>

    <div class="navbar-collapse collapse justify-content-end" id="navbarSupportedContent">
    <?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($dbconfig,"SELECT * FROM `admin` WHERE `username`='$showuser';"); 
    $showrow=mysqli_fetch_array($haha); ?>
  </div>
    </nav>

    <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php?page=card" class="list-group-item list-group-item-action">
              <h5>Bienvenido/a <?php  echo $showrow['nombre']; ?> </h5>
              </a>

        <a href="index.php?page=alumnos" class="list-group-item list-group-item-action">
		<i class="fas fa-user-graduate"></i> <span>Alumnos</span></a>

        <a href="index.php?page=añadir" class="list-group-item list-group-item-action">
    <i class="fas fa-user-plus"></i> <span>Agregar Alumno</span></a>

        <a href="index.php?page=profesores" class="list-group-item list-group-item-action">
    <i class="fas fa-user-tie"></i> <span>Profesores</span></a>

        <a href="index.php?page=añadirprof" class="list-group-item list-group-item-action">
    <i class="fas fa-portrait"></i> <span>Agregar Profesor</span></a>

        <a href="index.php?page=asignaturas" class="list-group-item list-group-item-action">
    <i class="fas fa-book"></i> <span>Asignaturas</span></a>

        <a href="index.php?page=añadirasig" class="list-group-item list-group-item-action">
    <i class="fas fa-book-open"></i>  <span>Agregar Asignatura</span></a>

        <a href="index.php?page=usuarios" class="list-group-item list-group-item-action">
    <i class="fas fa-user-cog"></i> <span>Administradores</span></a>

	     <a href="index.php?page=perfiluser" class="list-group-item list-group-item-action">
		<i class="fas fa-user"></i> <span>Perfil</span></a>

    <a href="logout.php" class="list-group-item list-group-item-action">
    <i class="fas fa-power-off"></i> <span>Salir</span></a>
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
    <br>
      <div class="container">
      <p class="letras">Copyright &copy; <?php echo date('Y') ?></p>
      </div>
    </footer>
    </body>
</html>
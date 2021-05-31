<?php
    $page = explode('/', $_SERVER['PHP_SELF']);
        $page = end($page);
    if ($page!=='index.php') {
        if ($page==$page){
            $page = explode('.', $page);
            header('Location: index.php?page='.$page[0]);
        }
    }
?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/card.css">

<h1 class="titulo"> 
<i class="far fa-file-alt"></i></a> 
<small>Información General</small></h1>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item active" aria-current="page">
     <i class="fas fa-home"></i> <span class="infor">Página Principal</span></li>
  </ol>
</nav>

<div class="caja">

  <div class="col-sm-4">
     <div class="card text-white mb-3" style="background-color:#919C72;">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
          <i class="fas fa-user-friends"></i>
          </div>

          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;
            <span style="font-size: 30px">
            <?php $alm=mysqli_query($dbconfig,'SELECT * FROM `alumnos`'); $alm= mysqli_num_rows($alm); echo $alm; ?>
            </span></div>
          </div>
        </div>
      </div>

      <div class="list-group-item list-group-item list-group-item-action">
         <a href="index.php?page=alumnos">
        <div class="row">
          <div class="col-sm-8">
            <p class="dir">Alumnos</p>
          </div>
          <div class="col-sm-4">
          <i class="fas fa-arrow-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

    <div class="col-sm-4">
     <div class="card text-white mb-3" style="background-color:#919C72;">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
          <i class="fas fa-users"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $users=mysqli_query($dbconfig,'SELECT * FROM `admin`'); $users= mysqli_num_rows($users); echo $users; ?></span></div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="list-group-item list-group-item list-group-item-action">
         <a href="index.php?page=usuarios">
        <div class="row">
          <div class="col-sm-8">
            <p class="dir">Administradores</p>
          </div>
          <div class="col-sm-4">
          <i class="fas fa-arrow-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
     <div class="card text-white mb-3" style="background-color:#919C72;">
      <div class="card-header">
        <div class="row">
          <?php $user = $_SESSION['user_login']; $perfil = mysqli_query($dbconfig,"SELECT * FROM `admin` WHERE `username`='$user';"); $user2=mysqli_fetch_array($perfil); ?>
          <div class="col-sm-6">
            <div class="nombre">
            <?php echo ucwords($user2['nombre']); ?></div>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
      <div class="list-group-item list-group-item list-group-item-action">
        <a href="index.php?page=perfiluser">
        <div class="row">
          <div class="col-sm-8">
            <p class="dir">Tu Perfil</p>
          </div>
          <div class="col-sm-4">
          <i class="fas fa-arrow-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>  

  </div>
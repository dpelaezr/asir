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

<h1><a href="index.php">
<i class="far fa-file-alt"></i></a> 
<small>Información General</small></h1>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item active" aria-current="page">
     <i class="fas fa-home"></i> Página Principal</li>
  </ol>
</nav>

<div class="caja">

  <div class="col-sm-4">
     <div class="card text-white bg-primary mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            
          </div>

          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;
            <span style="font-size: 30px">
            <?php $alm=mysqli_query($dbconfig,'SELECT * FROM `alumnos`'); $alm= mysqli_num_rows($alm); echo $alm; ?>
            </span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Total</div>
          </div>
        </div>
      </div>

      <div class="list-group-item-primary list-group-item list-group-item-action">
         <a href="index.php?page=alumnos">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Alumnos</p>
          </div>
          <div class="col-sm-4">
           <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

    <div class="col-sm-4">
     <div class="card text-white bg-info mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $users=mysqli_query($dbconfig,'SELECT * FROM `admin`'); $users= mysqli_num_rows($users); echo $users; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Totales</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
         <a href="index.php?page=usuarios">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Administradores</p>
          </div>
          <div class="col-sm-4">
           <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
     <div class="card text-white bg-warning mb-3">
      <div class="card-header">
        <div class="row">
          <?php $user = $_SESSION['user_login']; $perfil = mysqli_query($dbconfig,"SELECT * FROM `admin` WHERE `username`='$user';"); $user2=mysqli_fetch_array($perfil); ?>
          <div class="col-sm-6">
            <img class="showimg" src="img/
            <?php echo $user2['img']; ?>">
            <div style="font-size: 20px">
            <?php echo ucwords($user2['nombre']); ?></div>
          </div>
          <div class="col-sm-6">
            <div class="clearfix"></div>
            <div class="float-sm-right">Bienvenido/a</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <a href="index.php?page=perfiluser">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Tu Perfil</p>
          </div>
          <div class="col-sm-4">
            <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>  

  </div>
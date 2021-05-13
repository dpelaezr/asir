<?php require_once 'dbconfig.php';
    session_start();
        if(isset($_SESSION['user_login'])) {
            header('Location: index.php');
    }

        if (isset ($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $input_arr = array();
        }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>ASIR</title>
  </head>


  <body>
    <div class="container"><br>
          <h1 class="text-center">Acceso</h1><hr><br>
          <div class="d-flex justify-content-center">
          	<?php if(isset($nick)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" 
              class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $nick; ?></div><?php };?>
          		
                  <?php if(isset($wrongpass)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" 
                  class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $wrongpass; ?></div><?php };?>

          		<?php if(isset($status_inactive)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" 
                  class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $status_inactive; ?></div><?php };?>
          </div>

          <div class="row animate__animated animate__pulse">
            <div class="col-md-4 offset-md-4">
             	<form method="POST" action="">

				  <div class="form-group row">
				    <div class="col-sm-12">
				      <input type="text" class="form-control" name="username" value="<?= isset($nick2)? $nick2: ''; ?>" 
                      placeholder="Nombre de ususario" id="inputEmail3"> <?php echo isset($input_arr['input_user_error'])?
                       '<label>'.$input_arr['input_user_error'].'</label>':''; ?>
				    </div>
				  </div>

				  <div class="form-group row">
				    <div class="col-sm-12">
				      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                      <label><?php echo isset($input_arr['input_pass_error'])? '<label>'.$input_arr['input_pass_error'].'</label>':''; ?>
				    </div>
				  </div>

				  <div class="text-center">
				      <button type="submit" name="login" class="btn btn-warning">Entrar</button>
				    </div>
				</form>
            </div>
          </div>
    </div>


    <!-- JavaScript -->
    <!-- Primero jQuery, despues Popper.js, luego Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript">
    	$('.toast').toast('show')

    </script>
  </body>

  </html>
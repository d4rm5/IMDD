<?php
include('includes/header.php')
?>
<?php 
include('includes/db.php');
?>

        <?php

        if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM usuarios WHERE id = $id";
        $result = mysqli_query($dbconnect, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $usuario = $row['usuario'];
            $email = $row['email'];
            $contraseña = $row['contraseña'];
          }
        }

        if (isset($_POST['update'])) {
        if ($_POST['password'] == $_POST['password2']) {
          $usuario = $_POST['user'];
          $email = $_POST['email'];
          $contraseña = $_POST['password'];
          $query = "UPDATE usuarios set usuario = '$usuario', email = '$email', contraseña = '$contraseña' WHERE id = $id";
          mysqli_query($dbconnect, $query);
          session_destroy();
          header('Location: login.php');
        } else {
        	echo 'Las contraseñas no coinciden';
        }
    }

        ?>

<div class="container">
	<div class="row">
		<div class="col-4">

       	<h1>Editar usuario</h1>
			<div class="card">
				<div class="card-body">
				<form method='POST'>
  				<div class="mb-3">
    			<label for="exampleInputEmail1" class="form-label">Usuario</label>
    			<input type="text" class="form-control" name="user" value="<?=$usuario?>">
    			<div id="emailHelp" class="form-text">Elija un usuario de máximo 24 caracteres.</div>
  				</div>
				<div class="mb-3">
  					<label for="exampleFormControlInput1" class="form-label">Email</label>
  					<input type="email" class="form-control" id="exampleFormControlInput1" value="<?=$email?>" name="email">
				</div>
  				<div class="mb-3">
    			<label for="exampleInputPassword1" class="form-label">Contraseña</label>
   				<input type="password" class="form-control" name="password" value="<?=$contraseña?>">
   				<label for="exampleInputPassword1" class="form-label">Confirmar contraseña</label>
   				<input type="password" class="form-control" name="password2">
  				</div>
  				<button type="submit" class="btn btn-primary" name="update">Editar</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include('includes/footer.php')
?>
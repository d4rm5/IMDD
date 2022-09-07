<?php
include('includes/header.php')
?>

<div class="container">
	<div class="row">
		<div class="col-4">

       	<h1>Registrarse</h1>
			<div class="card">
				<div class="card-body">
				<form method='POST'>
  				<div class="mb-3">
    			<label for="exampleInputEmail1" class="form-label" required>Usuario</label>
    			<input type="text" class="form-control" name="user">
  				</div>
				<div class="mb-3">
  					<label for="exampleFormControlInput1" class="form-label" required>Email</label>
  					<input type="email" class="form-control" id="exampleFormControlInput1" name="email">
				</div>
  				<div class="mb-3">
    			<label for="exampleInputPassword1" class="form-label" required>Contraseña</label>
   				<input type="password" class="form-control" name="password">
   				<label for="exampleInputPassword1" class="form-label" required>Confirmar contraseña</label>
   				<input type="password" class="form-control" name="password2">
  				</div>
  				<button type="submit" class="btn btn-primary">Registrar</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
include('includes/db.php');

if(!isset($_SESSION['user'])) {
	if(isset($_POST['user'])) {
	if ($_POST['password'] == $_POST['password2']) {
		try {
			$user = $_POST['user'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$query = "INSERT INTO `usuarios` (`usuario`, `contraseña`, `email`) VALUES ('$user','$password', '$email')";
			$query = mysqli_query($dbconnect, $query);
			$_SESSION['message'] = 'Cuenta creada :D';
        	$_SESSION['message_type'] = 'primary'; 
			header("Location: login.php");
		} catch (Exception $e) {
			if ($e->getCode() == 1062) {
				Echo "Usuario o email en uso.";
			} else {
				Throw $e;
			}
		}
	} else
	  echo 'Las contraseñas no coinciden';
	} 
} else {
	header("Location: index.php");
}	
?>

<?php
include('includes/footer.php')
?>
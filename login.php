<?php
include('includes/header.php');
include('includes/db.php');
?>

<div class="container p-4">
	<div class="row">
		<div class="col-4">

			<!-- Alerta register -->
			<?php if(isset($_SESSION['message'])) { ?>
					<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
					<?= $_SESSION['message'] ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php unset($_SESSION["message"]); unset($_SESSION["message_type"]); } ?>

			<h1>Ingresar</h1>
			<div class="card">
				<div class="card-body">
				<form method='POST'>
  				<div class="mb-3">
    			<label for="exampleInputEmail1" class="form-label">Usuario</label>
    			<input type="text" class="form-control" name="user" required>
  				</div>
  				<div class="mb-3">
    			<label for="exampleInputPassword1" class="form-label">Contraseña</label>
   				<input type="password" class="form-control" name="password" required>
  				</div>
  				<button type="submit" class="btn btn-primary">Ingresar</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
if(!isset($_SESSION['user'])) {
	if(isset($_POST['user'])) {
		$user = $_POST['user'];
		$password = $_POST['password'];
		$query = "SELECT * FROM usuarios WHERE usuario = '$user' and contraseña = '$password'";
		// echo $query;
		$query = mysqli_query($dbconnect, $query) or die('error');
		if ($row = mysqli_fetch_array($query)) {
			$_SESSION['user'] = $_POST['user'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['message'] = 'Login existoso :D';
        	$_SESSION['message_type'] = 'primary'; 
			header("Location: index.php");
		} else {
			echo 'Usuario o contraseña erróneos o no existentes';
		}
	} 
	} else {
		// header("Location: index.php");
}	
?>
	

<?php
include('includes/footer.php')
?>
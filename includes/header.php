<?php 
if (isset($_POST['search'])) {
  $search = $_POST['search'];
  $s= 'Location: search.php?q='.$search;
  header($s);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMDD🎬</title>
    <!--CSS y Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stars.css">
</head>
<body>

<nav class="navbar navbar-expand-md bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">IMDD 🎬</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (isset($_SESSION['user'])) { ?>
        <li class="nav-item">
         <a href="criticas_user.php" class="nav-link">Mis reseñas</a>
        </li>
        <li class="nav-item">
         <a href="edit_user.php?id=<?= $_SESSION['id']?>" class="nav-link">Editar usuario</a>
        </li>
        <li class="nav-item">
         <a href="logout.php" class="nav-link">Cerrar sesión</a>
        <li>
          <li>
          <form class="d-flex" role="search" method="post">
          <input class="form-control me-2" type="search" placeholder="Buscar reseña" name="search" aria-label="Search" required>
          <button class="btn btn-outline-primary" type="submit">Buscar</button>
          </form>
        </li>
        <?php } else { ?>
        <li class="nav-item">
         <a href="register.php" class="nav-link">Registrarse</a>
        </li>
        <li class="nav-item">
         <a href="login.php" class="nav-link">Ingresar</a>
        </li>              
        <li>
          <form style="text-align:right;" class="d-flex" role="search" method="post">
            <input class="form-control me-2" type="search" placeholder="Buscar reseña" name="search" aria-label="Search" required>
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
          </form>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>


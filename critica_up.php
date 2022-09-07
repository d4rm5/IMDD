<?php
include('includes/db.php');

if (!isset($_SESSION['password'])) {
      header("Location: index.php");
}
?>
<?php
include('includes/header.php')
?>
  <body>
    <div class="container p-4">
      <div class="row">

        <div class="col-4">

        <h1>Subir una reseña</h1>
        <div class="card">
          <div class="card-body">
          <form method="POST">
            <div class="mb-3">
              <label class="form-label">Título</label>
              <input type="text" name="title">
            </div>
            <div class="mb-3">
              <label class="form-label" required>Crítica</label>
              <textarea name="critica" required></textarea>  
            </div>
            <div class="mb-3">
              <label class="form-label">Estrellas</label> 
              <span class="star-cb-group">
              <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
              <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
              <input type="radio" id="rating-3" name="rating" value="3" checked="checked" /><label for="rating-3">3</label>
              <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
              <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
              <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
              </span> 
            </div>
            <div class="mb-3">
              <label class="form-label">Imagen (URL)</label>
              <input type="text" name="imagen">  
            </div>
            <button type="submit" class="btn btn-primary">Subir</button>
          </form>
          </div>
        </div>


        </div>

      </div>
    </div>

    <?php 
      if (isset($_SESSION['password']) && isset($_POST['critica'])) {
        $title = $_POST['title'];
        $critica = $_POST['critica'];
        $stars = $_POST['rating'];
        if ($_POST['imagen'] !== '') {
        $imagen = $_POST['imagen'];
        } else {
          $imagen = 'https://www.webempresa.com/foro/wp-content/uploads/wpforo/attachments/3200/318277=80538-Sin_imagen_disponible.jpg  ';
        }

        $query = "INSERT INTO `reseñas` (`title`, `critica`, `estrellas`, `imagen`, `usuario`) VALUES ('$title', '$critica', '$stars', '$imagen', '".$_SESSION['user']."') " or die('error');

        $query = mysqli_query($dbconnect, $query);
        
        $_SESSION['message'] = 'Crítica publicada :D';
        $_SESSION['message_type'] = 'success';  

        header('location: criticas_user.php');

        // echo $query;
      }


    ?>

<?php
include('includes/footer.php')
?>
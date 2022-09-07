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

        <div class="col">

        <?php

        if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM reseñas WHERE id = $id";
        $result = mysqli_query($dbconnect, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $critica = $row['critica'];
            $stars = $row['estrellas'];
            $imagen = $row['imagen'];
          }
        }

        if (isset($_POST['update'])) {
          $title = $_POST['title'];
          $critica = $_POST['critica'];
          $stars = $_POST['rating'];
          $imagen = $_POST['imagen'];
          $query = "UPDATE reseñas set title = '$title', critica = '$critica', estrellas = '$stars', imagen = '$imagen' WHERE id = $id";
          mysqli_query($dbconnect, $query);
          $_SESSION['message'] = 'Critica editada ;)';
          $_SESSION['message_type'] = 'info';
          header('Location: criticas_user.php');
        }

        ?>

          <form method="POST">
            <div class="mb-3">
              <label>Título</label>
              <input type="text" value="<?= $title;?>" name="title" required>
            </div>
            <div class="mb-3">
              <label>Crítica</label>
              <textarea name="critica" required><?= $critica;?></textarea>  
            </div>
            <div class="mb-3">
              <label>Estrellas</label> 
              <span class="star-cb-group">
              <?php switch ($stars) {
                case 5:
                 ?>
                <input type="radio" id="rating-5" name="rating" value="5" checked="checked" /><label for="rating-5">5</label>
                <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
                 <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
              <?php break; case 4: ?>
                <input type="radio" id="rating-5" name="rating" value="5"/><label for="rating-5">5</label>
                <input type="radio" id="rating-4" name="rating" value="4" checked="checked"/><label for="rating-4" >4</label>
                 <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
              <?php break; case '3': ?>
                <input type="radio" id="rating-5" name="rating" value="5"/><label for="rating-5">5</label>
                <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
                 <input type="radio" id="rating-3" name="rating" value="3" checked="checked" /><label for="rating-3" >3</label>
                <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
              <?php break; case 2: ?>
                <input type="radio" id="rating-5" name="rating" value="5"/><label for="rating-5">5</label>
                <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
                 <input type="radio" id="rating-3" name="rating" value="3"/><label for="rating-3">3</label>
                <input type="radio" id="rating-2" name="rating" value="2" checked="checked" /><label for="rating-2">2</label>
                <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
              <?php break; case 1: ?>
                <input type="radio" id="rating-5" name="rating" value="5"/><label for="rating-5">5</label>
                <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
                 <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                <input type="radio" id="rating-1" name="rating" value="1" checked="checked"/><label for="rating-1" >1</label>
                <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
              <?php break; case 0: ?>
                <input type="radio" id="rating-5" name="rating" value="5"><label for="rating-5">5</label>
                <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
                 <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                <input type="radio" id="rating-0" name="rating" value="0" checked="checked" class="star-cb-clear" /><label for="rating-0">0</label>
              <?php }?>
              </span> 
            </div>
            <div class="mb-3">
              <label>Imagen (URL)</label>
              <input type="text" value="<?= $imagen;?>" name="imagen" required>  
            </div>
            <button type="submit" class="btn btn-primary" name='update'>Editar</button>
          </form>

        </div>

      </div>
    </div>

<?php
include('includes/footer.php')
?>
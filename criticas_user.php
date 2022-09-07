<?php
include('includes/db.php');

if (!isset($_SESSION['password'])) {
      header("Location: index.php");
} else {
  $user_s = $_SESSION['user'];
}
?>
<?php
include('includes/header.php')
?>
    <div class="container p-4">
      <div class="row g-1">


        <!-- Alerta subida -->
        <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php unset($_SESSION["message"]); unset($_SESSION["message_type"]); } ?>

        <!-- Alerta editada -->
        <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php unset($_SESSION["message"]); unset($_SESSION["message_type"]); } ?>
        
        <!-- Print críticas -->
        <div class="d-grid gap-2">
          <a href="critica_up.php" class="btn btn-primary" type="button">Subir reseña 📝</a>
        </div>
        <h1>Tus reseñas ⬇️</h1>
        <?php
                    $query = "SELECT * FROM reseñas WHERE usuario = '$user_s' ORDER BY id DESC";
                    $query = mysqli_query($dbconnect, $query) or die ('error');

                    while($row = mysqli_fetch_array($query)) { ?>
                      <div class="card col-md-3" style="width: 18srem;">

                        <img src="<?=$row['imagen']?>" class="card-img-top">

                        <div class="card-body">
                          <h4 class="card-title"><?=$row['title']?></h4>
                          <p class="card-text"><?=str_repeat("⭐", $row['estrellas']);?></p>
                          <p class="card-text"><?=$row['critica']?></p>
                          <?= "<a onClick=\"javascript: return confirm('Confirmar eliminación'    );\" href='critica_delete.php?id=".$row['id']."' class='btn btn-outline-danger'>❌</a>" ?>
                          <a href="critica_edit.php?id=<?= $row['id']?>" class="btn btn-outline-primary">✏️</a>
                          <!-- <a href="critica_delete.php?id=<?= $row['id']?>" class="btn btn-outline-danger">❌</a> -->
                        </div>

                        <div class="card-footer">
                          <p class="card-text">Subido por <?=$row['usuario']?> - <?=$row['time']?></p>
                        </div>

                      </div>

        <?php } ?>
      </div>
    </div>
    




<?php
include('includes/footer.php')
?>
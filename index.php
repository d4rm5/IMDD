<?php
include('includes/db.php');
?>
<?php
include('includes/header.php')
?>
    <div class="container p-4">
      <div class="row g-1">

        <!-- Alerta login -->
        <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php unset($_SESSION["message"]); unset($_SESSION["message_type"]); } ?>

        <?php if (isset($_SESSION['user'])) { ?>
        <div class="d-grid gap-2">
          <a href="critica_up.php" class="btn btn-primary" type="button">Subir reseña 📝</a>
        </div>
        <?php } else { ?>
        <div class="row">
          <div class="col">
        <h1>Bienvenido a IMDD 👋🏻</h1>
        <p>Registrate e inicia sesión para poder subir tus reseñas ✨</p>
      </div>
       </div>
        <?php } ?>

        <h1>Reseñas ⬇️</h1>
        <!-- Print críticas -->
        <?php
                    $query = "SELECT * FROM reseñas ORDER BY id DESC";
                    $query = mysqli_query($dbconnect, $query) or die ('error');

                    while($row = mysqli_fetch_array($query)) { ?>
                      <div class="card col-md-4" style="width: 18srem;">

                        <img src="<?=$row['imagen']?>" class="card-img-top">

                        <div class="card-body">
                          <h4 class="card-title"><?=$row['title']?></h4>
                          <p class="card-text"><?=str_repeat("⭐", $row['estrellas']);?></p>
                          <p class="card-text"><?=$row['critica']?></p>
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
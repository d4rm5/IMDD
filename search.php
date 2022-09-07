<?php
if (isset($_GET['q'])) {
    include('includes/db.php');
    $search = $_GET['q'];
    $flag= false;
} else {
    header('Location: index.php');
}
?>
<?php
include('includes/header.php')
?>
    <div class="container p-4">
      <div class="row g-1">

      <div class="row">
          <div class="col">
        <h1>Resultados:</h1>
            </div>
        </div>

        <!-- Print busqueda -->
        <?php
                    $query = "SELECT * FROM reseñas WHERE title LIKE '%$search%' OR usuario LIKE '%$search%' or critica LIKE '%$search%' ORDER BY id DESC";
                    $query = mysqli_query($dbconnect, $query) or die ('error');

                    while($row = mysqli_fetch_array($query)) { $flag = true; ?>
                    
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


        <?php if ($flag == false) { ?>
            <p>No se han encontrado resultados.</p>
        <?php } ?>

        
      </div>
    </div>
    




<?php
include('includes/footer.php')
?>
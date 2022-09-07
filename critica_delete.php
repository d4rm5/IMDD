<?php
    include('includes/db.php');

    if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "DELETE FROM reseñas WHERE id = $id";
            $result =   mysqli_query($dbconnect, $query);
            if (!$result) {
                die("Query failed :/");
            }

            $_SESSION['message'] = 'Critica eliminada ;)';
            $_SESSION['message_type'] = 'danger';

            header("Location: criticas_user.php");
    }
?>
<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (empty($id_buku)) {
        echo "ID buku tidak valid.";
        exit;
    }

    $query = "DELETE FROM buku WHERE id_buku = $id";

    if (mysqli_query($conn, $query)) {
        header('Location: buku1.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

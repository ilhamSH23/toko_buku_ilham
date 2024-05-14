<?php
    include '../../config/database.php';

    $hapus = "delete from buku where id_buku=". $_GET['id'];
    $conn -> query($hapus);
    header('location: buku1.php');

?>

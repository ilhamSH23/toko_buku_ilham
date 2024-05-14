<?php
require_once '../../layout/header.php';
include '../../config/database.php';

$query = "SELECT * FROM buku LIMIT 10";
$result = mysqli_query($conn, $query);

if (!$result) {

    echo "Error: " . mysqli_error($conn);
    exit;
}


$hs = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Penulis</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Stok</th>
      <th scope="col">Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $nomor = 1;
    foreach ($hs as $item){
    ?>
    <tr>
      <th scope="row"><?= $nomor ?></th>
      <td><?=$item['judul']?></td>
      <td><?=$item['penulis']?></td>
      <td><?=$item['penerbit']?></td>
      <td><?=$item['stok']?></td>
      <td><?=$item['harga_jual']?></td>
      <td>
      <button type="button" class="btn btn-danger">Delete</button>
      <button type="button" class="btn btn-warning">Edit</button>
      </td>
    </tr>
    <?php 
      $nomor++;
    }
    ?>
  </tbody>
</table>

<?php
require_once '../../layout/footer.php';
?>

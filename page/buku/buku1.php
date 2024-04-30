
<?php
require_once '../../layout/header.php';
?>

<?php
include '../../config/database.php';
$hs = "SELECT * FROM buku LIMIT 10";

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
    $i = $halaman >1 ? ($halaman- 1)*10 + 1 : 1;
    foreach ($item as $item):
    ?>
   <tr>
      <th scope="row"><?= $i ?></th>
      <td><?=$item ['Judul']?></td>
      <td><?=$item ['penulis']?></td>
      <td><?=$item ['penerbit']?></td>
      <td><?=$item ['stok']?></td>
      <td><?=$item ['harga_jual']?></td>   
    </tr>

   <?php

   $i = 1;
   foreach ($hasil as $data);
   ?>
  </tbody>
</table>

<?php
require_once '../../layout/footer.php';
?>
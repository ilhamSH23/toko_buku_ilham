<?php
// buat koneksi
$connection = new mysqli("localhost", "root", "", "toko_buku_ilham");
//buat query
$query = "select * from buku ";
// jalankan query dan simpan di variabel
$hasil = $connection->query($query);
// siapkan variabel untuk menampung data dalam bentuk array
$buku = [];
// isi data buku dari data base
while ($baris = $hasil->fetch_assoc()) {
    $buku[] = $baris;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container ">
        <form>
            <fieldset>
                <legend>Penjualan</legend>
                <div class="d-flex justify-content-between">
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" name="date" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="<?= date("Y-m-d") ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Total</label>
                        <input type="text" name="text" id="disabledTextInput" class="form-control" placeholder="911">
                    </div>
                </div>

            </fieldset>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Kode_buku</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" id="buku" class="form-control"></td>
                        <td><input type="text" id="judul" class="form-control"></td>
                        <td><input type="text" id="penerbit" class="form-control"></td>
                        <td><input type="text" id="harga" class="form-control"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script>
        let data_buku=<?=json_encode($buku)?>
     
        // cara 1
        // buku.onkeyup=function(){
        //     alert(buku.value)
        // }

        // cara 2
        document.getElementById("buku").onkeyup = function() {
            // simpan id yang di input user
            let id_buku = buku.value;
            // cari index buku dari id yang di masukan
            let chossenbuku = data_buku.findIndex(e=>e.id_buku == id_buku);
            judul.value=data_buku[chossenbuku].judul;    

        }
        
    </script>
</body>

</html>
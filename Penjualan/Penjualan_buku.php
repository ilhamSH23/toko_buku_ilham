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

if (isset($_POST["submit"])) {
    
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
        <form action="" method="post">
            <fieldset>
                <legend>Penjualan</legend>
                <div class="d-flex justify-content-between">
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" name="date" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="<?= date("Y-m-d") ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Total</label>
                        <input type="text" name="total" id="total" class="form-control" value="0">
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
                        <th scope="col">diskon</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody id="tb">
                    <tr id="tabel">
                        <td><input type="text" id="buku" name="kode_buku" class="form-control"></td>
                        <td><input type="text" id="judul" name="judul" class="form-control"></td>
                        <td><input type="text" id="penerbit" name="penerbit" class="form-control"></td>
                        <td><input type="text" id="harga" name="harga" class="form-control"></td>
                        <td><input type="text" id="jumlah" name="jumlah" value="1" class="form-control"></td>
                        <td><input type="text" id="diskon" name="diskon" class="form-control"></td>
                        <td><input type="text" id="subtotal" name="subtotal" class="form-control"></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" id="tambah" class="btn btn-primary">Tambah</button>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- <script>
        let data_buku = <?= json_encode($buku) ?>

        // cara 1
        // buku.onkeyup=function(){
        //     alert(buku.value)
        // }

        // cara 2
        document.getElementById("buku").onkeyup = function() {
            // simpan id yang di input user
            let id_buku = buku.value;
            console.log(id_buku)
            // cari index buku dari id yang di masukan
            let chossenbuku = data_buku.findIndex(e => e.id_buku == id_buku);
            console.log(chossenbuku)
            // judul.value=data_buku[chossenbuku].judul;    
            console.log(data_buku[chossenbuku])
        }
    </script> -->

    <script>
        let tambah = document.getElementById("tambah");

        tambah.onclick = function() {
            let tb = document.getElementById("tb");
            let tabel = document.getElementById("tabel");
            let barisbaru = tabel.cloneNode(true);

            barisbaru.querySelectorAll("input").forEach(input => {
                input.value = ""
            });;

            tb.appendChild(barisbaru)
        }

        let data_buku = <?php echo json_encode($buku); ?>

        document.getElementById("buku").onkeyup = function() {
            document.getElementById("judul").value = data_buku[this.value].judul;
            document.getElementById("penerbit").value = data_buku[this.value].penerbit;
            document.getElementById("harga").value = data_buku[this.value].harga_jual;
            document.getElementById("diskon").value = data_buku[this.value].diskon;
            document.getElementById("subtotal").value = document.getElementById("harga").value * this.value - document.getElementById("diskon").value;
            document.getElementById("total").value = parseInt(document.getElementById("total").value) + parseInt(document.getElementById("subtotal").value)
        }
        document.getElementById("jumlah").onkeyup = function() {
            // document.getElementById("total").value = parseInt(document.getElementById("total").value) + parseInt(document.getElementById("subtotal").value)
            document.getElementById("subtotal").value = document.getElementById("harga").value * this.value - document.getElementById("diskon").value;
        }
    </script>
</body>

</html>
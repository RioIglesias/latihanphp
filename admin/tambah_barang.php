<?php
include ("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Barang = $_POST['ID_Barang'];
    $NamaBarang = $_POST['NamaBarang'];
    $Satuan = $_POST['Satuan'];
    $HargaSatuan = $_POST['HargaSatuan'];

    $database = new db();
    // Mengubah urutan parameter saat memanggil fungsi tambahKasir()
    $database->tambahBarang($ID_Barang, $NamaBarang, $Satuan, $HargaSatuan);

    header("Location: barang.php");
    exit;
}
?>

<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Barang</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="ID_Barang">ID Barang</label>
            <input type="text" class="form-control" id="ID_Barang" name="ID_Barang" placeholder="Masukkan ID Barang"
                required>
        </div>
        <div class="form-group">
            <label for="NamaBarang">Nama Barang</label>
            <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Masukkan nama barang"
                required>
        </div>
        <div class="form-group">
            <label for="Satuan">Satuan</label>
            <input type="text" class="form-control" id="Satuan" name="Satuan" placeholder="Masukkan satuan" required>
        </div>
        <div class="form-group">
            <label for="HargaSatuan">Harga Satuan</label>
            <input type="number" class="form-control" id="HargaSatuan" name="HargaSatuan"
                placeholder="Masukkan harga satuan" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="barang.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>
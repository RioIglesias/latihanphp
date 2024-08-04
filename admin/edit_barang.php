<?php
include("../db.php");

$database = new db();
$barang = $database->getIdBarang($_GET['ID_Barang'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database->editBarang(
        $_POST['ID_Barang'],
        $_POST['NamaBarang'],
        $_POST['Satuan'],
        $_POST['HargaSatuan'],
    );
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
    <h1 class="h3 mb-4 text-gray-800">Edit Data barang</h1>
    <form method="post" action="">
    <input type="hidden" name="ID_Barang" value="<?= $barang['ID_Barang']; ?>">
        <div class="form-group">
            <label for="ID_Barang">ID Barang</label>
            <input type="text" class="form-control" id="ID_Barang" name="ID_Barang" value="<?= $barang['ID_Barang']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="NamaBarang">Nama Barang</label>
            <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" value="<?= $barang['NamaBarang']; ?>">
        </div>
        <div class="form-group">
            <label for="Satuan">Satuan</label>
            <input type="text" class="form-control" id="Satuan" name="Satuan" value="<?= $barang['Satuan']; ?>">
        </div>
        <div class="form-group">
            <label for="HargaSatuan">Harga Satuan</label>
            <input type="text" class="form-control" id="HargaSatuan" name="HargaSatuan" value="<?= $barang['HargaSatuan']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="barang.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>
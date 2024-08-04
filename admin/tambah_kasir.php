<?php
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Kasir   = $_POST['ID_Kasir'];
    $Username   = $_POST['Username'];
    $Password   = $_POST['Password'];
    $NamaKasir  = $_POST['NamaKasir'];
    $Alamat     = $_POST['Alamat'];
    $NomorHP    = $_POST['NomorHP'];
    $NomorKTP   = $_POST['NomorKTP'];

    $database = new db();
    // Mengubah urutan parameter saat memanggil fungsi tambahKasir()
    $database->tambahKasir($ID_Kasir, $Username, $Password, $NamaKasir, $Alamat, $NomorHP, $NomorKTP);

    header("Location: kasir.php");
    exit;
}
?>

<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Kasir</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="ID_Kasir">ID Kasir</label>
            <input type="text" class="form-control" id="ID_Kasir" name="ID_Kasir" placeholder="Masukkan ID Kasir" required>
        </div>
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="Username" name="Username" placeholder="Masukkan username" required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" placeholder="Masukkan password" required>
        </div>
        <div class="form-group">
            <label for="NamaKasir">Nama Kasir</label>
            <input type="text" class="form-control" id="NamaKasir" name="NamaKasir" placeholder="Masukkan nama kasir" required>
        </div>
        <div class="form-group">
            <label for="Alamat">Alamat</label>
            <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Masukkan alamat" required>
        </div>
        <div class="form-group">
            <label for="NomorHP">Nomor HP</label>
            <input type="text" class="form-control" id="NomorHP" name="NomorHP" placeholder="Masukkan nomor hp" required>
        </div>
        <div class="form-group">
            <label for="NomorKTP">Nomor KTP</label>
            <input type="text" class="form-control" id="NomorKTP" name="NomorKTP" placeholder="Masukkan nomor ktp" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="kasir.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>
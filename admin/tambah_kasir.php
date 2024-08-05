<?php
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username   = $_POST['Username'];
    $Password   = md5($_POST['Password']);
    $NamaKasir  = $_POST['Nama'];

    $database = new db();
    // Mengubah urutan parameter saat memanggil fungsi tambahKasir()
    $database->tambahAdmin($Username, $Password, $NamaKasir);

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
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="Username" name="Username" placeholder="Masukkan username" required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" placeholder="Masukkan password" required>
        </div>
        <div class="form-group">
            <label for="NamaKasir">Nama</label>
            <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Masukkan nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="kasir.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>
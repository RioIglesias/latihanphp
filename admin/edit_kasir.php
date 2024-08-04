<?php
include("../db.php");

$database = new db();
$kasir = $database->getIdKasir($_GET['ID_Kasir'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database->editKasir(
        $_POST['ID_Kasir'],
        $_POST['Username'],
        $_POST['Password'],
        $_POST['NamaKasir'],
        $_POST['Alamat'],
        $_POST['NomorHP'],
        $_POST['NomorKTP'],
    );
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
    <h1 class="h3 mb-4 text-gray-800">Edit Data Kasir</h1>
    <form method="post" action="">
    <input type="hidden" name="ID_Kasir" value="<?= $kasir['ID_Kasir']; ?>">
        <div class="form-group">
            <label for="ID_Kasir">ID Kasir</label>
            <input type="text" class="form-control" id="ID_Kasir" name="ID_Kasir" value="<?= $kasir['ID_Kasir']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="Username" name="Username" value="<?= $kasir['Username']; ?>">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="text" class="form-control" id="Password" name="Password" value="<?= $kasir['Password']; ?>">
        </div>
        <div class="form-group">
            <label for="NamaKasir">Nama Kasir</label>
            <input type="text" class="form-control" id="NamaKasir" name="NamaKasir" value="<?= $kasir['NamaKasir']; ?>">
        </div>
        <div class="form-group">
            <label for="Alamat">Alamat</label>
            <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?= $kasir['Alamat']; ?>">
        </div>
        <div class="form-group">
            <label for="NomorHP">Nomor HP</label>
            <input type="text" class="form-control" id="NomorHP" name="NomorHP" value="<?= $kasir['NomorHP']; ?>">
        </div>
        <div class="form-group">
            <label for="NomorKTP">Nomor KTP</label>
            <input type="text" class="form-control" id="NomorKTP" name="NomorKTP" value="<?= $kasir['NomorKTP']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="kasir.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>
<?php
include("../db.php");

if (isset($_GET['ID_Barang'])) (new db())->hapusBarang($_GET['ID_Barang']);
header("Location: barang.php");
exit;

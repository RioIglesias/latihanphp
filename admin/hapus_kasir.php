<?php
include("../db.php");

if (isset($_GET['ID_Kasir'])) (new db())->hapusKasir($_GET['ID_Kasir']);
header("Location: kasir.php");
exit;

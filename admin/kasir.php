<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kasir</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Kasir</h6>
            <a href="tambah_kasir.php" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>ID Kasir</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomor HP</th>
                            <th>Nomor KTP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include ("../db.php");
                        $database = new db();
                        $kasir = $database->getAllKasir();
                        foreach ($kasir as $data) {
                            echo "<tr align='center'>";
                            echo "<td>" . $data['ID_Kasir'] . "</td>";
                            echo "<td>" . $data['Username'] . "</td>";
                            echo "<td>" . $data['NamaKasir'] . "</td>";
                            echo "<td>" . $data['Alamat'] . "</td>";
                            echo "<td>" . $data['NomorHP'] . "</td>";
                            echo "<td>" . $data['NomorKTP'] . "</td>";
                            echo "<td>
                        <a href='edit_kasir.php?ID_Kasir=" . $data['ID_Kasir'] . "' class='btn btn-warning' onclick='return confirm(\"Edit data?\")'><i class='fas fa-edit'></i></a>
                        <a href='hapus_kasir.php?ID_Kasir=" . $data['ID_Kasir'] . "' class='btn btn-danger' onclick='return confirm(\"Hapus data?\")'><i class='fas fa-trash-alt'></i></a>
                        </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>

<?php
include "../templates/footer.php";
?>
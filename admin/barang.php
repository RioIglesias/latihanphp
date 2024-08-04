<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Barang</h6>
            <a href="tambah_barang.php" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include ("../db.php");
                        $database = new db();
                        $barang = $database->getAllBarang();
                        foreach ($barang as $data) {
                            echo "<tr align='center'>";
                            echo "<td>" . $data['ID_Barang'] . "</td>";
                            echo "<td>" . $data['NamaBarang'] . "</td>";
                            echo "<td>" . $data['Satuan'] . "</td>";
                            echo "<td>" . number_format($data['HargaSatuan'], 0, ',', '.') . "</td>";
                            echo "<td>
                        <a href='edit_barang.php?ID_Barang=" . $data['ID_Barang'] . "' class='btn btn-warning' onclick='return confirm(\"Edit data?\")'><i class='fas fa-edit'></i></a>
                        <a href='hapus_barang.php?ID_Barang=" . $data['ID_Barang'] . "' class='btn btn-danger' onclick='return confirm(\"Hapus data?\")'><i class='fas fa-trash-alt'></i></a>
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
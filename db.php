<?php

class db
{
    private $koneksi;
    function __construct()
    {
        $this->koneksi = new mysqli("localhost", "root", "", "db_kasir");
    }

    function getUser($Username, $password)
    {
        return $this->koneksi->query("SELECT * FROM kasir WHERE Username = '$Username' AND password = '$password'");
    }
    function getAdmin($Username, $password)
    {
        return $this->koneksi->query("SELECT * FROM admin WHERE Username = '$Username' AND password = '$password'");
    }

    function getIdKasir($ID_Kasir)
    {
        return $this->koneksi->query("SELECT * FROM kasir WHERE ID_Kasir = '$ID_Kasir'")->fetch_assoc();
    }

    function getIdBarang($ID_Barang)
    {
        return $this->koneksi->query("SELECT * FROM barang WHERE ID_Barang = '$ID_Barang'")->fetch_assoc();
    }



    function getAllKasir()
    {
        return $this->koneksi->query("SELECT * FROM kasir");
    }

    function getAllBarang()
    {
        return $this->koneksi->query("SELECT * FROM barang");
    }

    function getAllJadwal()
    {
        $query = "SELECT tbl_jadwal.*, tbl_dosen.nama_dosen, tbl_matkul.nama_matkul 
              FROM tbl_jadwal 
              JOIN tbl_dosen    ON tbl_jadwal.kd_dosen = tbl_dosen.kd_dosen 
              JOIN tbl_matkul   ON tbl_jadwal.kd_matkul = tbl_matkul.kd_matkul";
        return $this->koneksi->query($query);
    }

    function getAllKrs()
    {
        $query = "SELECT tbl_krs.*, tbl_mahasiswa.nim, tbl_jadwal.ruang, tbl_semester.semester 
                  FROM tbl_krs 
                  JOIN tbl_mahasiswa ON tbl_krs.nim = tbl_mahasiswa.nim 
                  JOIN tbl_jadwal    ON tbl_krs.id_jadwal = tbl_jadwal.id_jadwal
                  JOIN tbl_semester  ON tbl_krs.kd_semester = tbl_semester.kd_semester";
        return $this->koneksi->query($query);
    }




    function tambahKasir($ID_Kasir, $Username, $Password, $NamaKasir, $Alamat, $NomorHP, $NomorKTP)
    {
        return $this->koneksi->query("INSERT INTO kasir (ID_Kasir, Username, Password, NamaKasir, Alamat, NomorHP, NomorKTP) VALUES ('$ID_Kasir', '$Username', '$Password', '$NamaKasir', '$Alamat', '$NomorHP', '$NomorKTP')");
    }

    function tambahAdmin($Username, $Password, $Nama)
    {
        return $this->koneksi->query("INSERT INTO admin (username, password, name) VALUES ( '$Username', '$Password', '$Nama')");
    }

    function tambahBarang($ID_Barang, $NamaBarang, $Satuan, $HargaSatuan)
    {
        return $this->koneksi->query("INSERT INTO barang (ID_Barang, NamaBarang, Satuan, HargaSatuan) VALUES ('$ID_Barang', '$NamaBarang', '$Satuan', '$HargaSatuan')");
    }

    




    function editKasir($ID_Kasir, $Username, $Password, $NamaKasir, $Alamat, $NomorHP, $NomorKTP)
    {
        $this->koneksi->query("UPDATE kasir SET Username = '$Username', Password = '$Password', NamaKasir = '$NamaKasir', Alamat = '$Alamat', NomorHP = '$NomorHP', NomorKTP = '$NomorKTP' WHERE ID_Kasir = '$ID_Kasir'");
    }

    function editBarang($ID_Barang, $NamaBarang, $Satuan, $HargaSatuan)
    {
        $this->koneksi->query("UPDATE barang SET NamaBarang = '$NamaBarang', Satuan = '$Satuan', Satuan = '$Satuan', HargaSatuan = '$HargaSatuan' WHERE ID_Barang = '$ID_Barang'");
    }





    function hapusKasir($ID_Kasir)
    {
        $this->koneksi->query("DELETE FROM kasir WHERE ID_Kasir = '$ID_Kasir'");
    }

    function hapusBarang($ID_Barang)
    {
        $this->koneksi->query("DELETE FROM barang WHERE ID_Barang = '$ID_Barang'");
    }
}

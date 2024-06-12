<?php
session_start();
include_once('../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_supplier = isset($_POST['nama_supplier']) ? $_POST['nama_supplier'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $telp = isset($_POST['telp']) ? $_POST['telp'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    if ($_GET['act'] == "insert") {
        $query = "INSERT INTO tb_supplier (nama_supplier, alamat, telp, email) VALUES ('$nama_supplier','$alamat','$telp','$email')";
        $exec = mysqli_query($koneksi, $query);
        if ($exec) {
            $_SESSION['pesan'] = "Data supplier telah ditambahkan";
            header('location:../../dashboard.php?modul=suplier');
        } else {
            $_SESSION['pesan'] = "Data supplier gagal ditambahkan";
            header('location:../../dashboard.php?modul=suplier');
        }
    } elseif ($_GET['act'] == "update") {
        $id = $_GET['id'];
        $query = "UPDATE tb_supplier SET nama_supplier='$nama_supplier', alamat='$alamat', telp='$telp', email='$email' WHERE id='$id'";
        $exec = mysqli_query($koneksi, $query);
        if ($exec) {
            $_SESSION['pesan'] = "Data supplier telah diubah";
            header('location:../../dashboard.php?modul=suplier');
        } else {
            $_SESSION['pesan'] = "Data supplier gagal diubah";
            header('location:../../dashboard.php?modul=suplier');
        }
    }
} else {
    if ($_GET['act'] == "delete") {
        $id = $_GET['id'];
        $query = "DELETE FROM tb_supplier WHERE id='$id'";
        $exec = mysqli_query($koneksi, $query);
        if ($exec) {
            $_SESSION['pesan'] = "Data supplier telah dihapus";
            header('location:../../dashboard.php?modul=suplier');
        } else {
            $_SESSION['pesan'] = "Data supplier gagal dihapus";
            header('location:../../dashboard.php?modul=suplier');
        }
    } else {
        header('location:../../index.php');
    }
}
?>

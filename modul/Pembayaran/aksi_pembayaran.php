<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']. "app_sia/koneksi.php");

$koneksi = mysqli_connect("localhost", "root", "", "app_sia");

if($_SERVER["REQUEST_METHOD"] == 'POST'){}
    if($_GET['act'] == "insert"){
        $invoice = $_POST['invoice'];
        $tanggal = $_POST['tanggal'];
        $total = $_POST['total'];
        $keterangan = $_POST['keterangan'];

        if ($_GET['act'] == "insert") {
        $query = "INSERT INTO tb_pembayaran (invoice, tanggal, total, keterangan) VALUES('$invoice','$tanggal','$total','$keterangan')";
        $exec = mysqli_query($koneksi, $query);

        if($exec) {
            $_SESSION['pesan'] = "Data pembayaran telah ditambahkan";
        }else{
            $_SESSION['error'] = "Data pembayaran gagal ditambahkan";
        }
        header('location:../../dashboard.php?modul=pembayaran');
    }elseif($_GET['act'] == "update"){
        $id = $_GET['id'];
        $invoice = $_POST['invoice'];
        $tanggal = $_POST['tanggal'];
        $total = $_POST['total'];
        $keterangan = $_POST['keterangan'];
        $query = "UPDATE tb_pembayaran SET invoice='$invoice',tanggal='$tanggal', total='$total', keterangan='$keterangan' WHERE id='$id'";
        $exec = mysqli_query($koneksi, $query);

        if($exec){
            $_SESSION['pesan'] = "Data pembayaran telah diubah";
        }else{
            $_SESSION['error'] = "Data pembayaran gagal diubah: " . mysqli_error($koneksi);
        }
        header('location:../../dashboard.php?modul=pembayaran');
    }
}elseif ($_GET['act'] == "delete"){
        $id = $_GET['id'];
        $query = "DELETE FROM tb_pembayaran WHERE id='$id'";
        $exec = mysqli_query($koneksi, $query);

        if($exec){
            $_SESSION['pesan'] = "Data pembayaran telah dihapus";
        }else{
            $_SESSION['error'] = "Data pembayaran gagal dihapus: " . mysqli_error($koneksi);
        }
        header('location:../../dashboard.php?modul=pembayaran');
    } else {
        header('location:../../index.php');
    }
    ?> 
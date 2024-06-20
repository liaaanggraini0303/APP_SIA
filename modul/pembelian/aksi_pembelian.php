<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/app_sia/koneksi.php");

$koneksi = mysqli_connect("localhost", "root", "", "app_sia");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $action = isset($_GET['act']) ? $_GET['act'] : '';

    $invoice = isset($_POST['invoice']) ? $_POST['invoice'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $id_suplier = isset($_POST['id_suplier']) ? $_POST['id_suplier'] : '';
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : '';
    $total = isset($_POST['total']) ? $_POST['total'] : '';
    $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : '';

    if ($action == "insert") {
        $query = "INSERT INTO tb_pembelian (invoice, tanggal, id_suplier, jumlah, harga, total, keterangan) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'sssiiis', $invoice, $tanggal, $id_suplier, $jumlah, $harga, $total, $keterangan);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['pesan'] = "Data pembelian telah ditambahkan";
        } else {
            $_SESSION['error'] = "Data pembelian gagal ditambahkan: " . mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt);
        header('Location: ../../dashboard.php?modul=pembelian');
        exit;
    } elseif ($action == "update") {
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        if ($id) {
            $query = "UPDATE tb_pembelian SET invoice = ?, tanggal = ?, id_suplier = ?, jumlah = ?, harga = ?, total = ?, keterangan = ? WHERE id = ?";
            $stmt = mysqli_prepare($koneksi, $query);
            mysqli_stmt_bind_param($stmt, 'sssiiisi', $invoice, $tanggal, $id_suplier, $jumlah, $harga, $total, $keterangan, $id);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['pesan'] = "Data pembelian telah diubah";
            } else {
                $_SESSION['error'] = "Data pembelian gagal diubah: " . mysqli_error($koneksi);
            }
            mysqli_stmt_close($stmt);
            header('Location: ../../dashboard.php?modul=pembelian');
            exit;
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == 'GET' && isset($_GET['act']) && $_GET['act'] == "delete") {
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if ($id) {
        $query = "DELETE FROM tb_pembelian WHERE id = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['pesan'] = "Data pembelian telah dihapus";
        } else {
            $_SESSION['error'] = "Data pembelian gagal dihapus: " . mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt);
        header('Location: ../../dashboard.php?modul=pembelian');
        exit;
    }
} else {
    header('Location: ../../index.php');
    exit;
}
?>

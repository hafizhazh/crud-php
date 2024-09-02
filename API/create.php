<?php 

//render halaman manjeadi json
header('Content-Type: application/json');
require '../config/app.php';


//menerima input
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

//check validasi data
if ($nama == null) {
    echo json_encode(['pesan'=> 'nama barang tidak boleh kosong']);
    exit;
}


//query tambah data
$query = "INSERT INTO barang VALUES(null,'$nama', '$jumlah', '$harga',CURRENT_TIMESTAMP())";
mysqli_query($db, $query);

//cek staatus data
if ($query) {
    echo json_encode(['pesan' => 'data barang behasil di tambahkan']);
} else {
    echo json_encode(['pesan'=> 'data barang gagal di tambahkan']);
}


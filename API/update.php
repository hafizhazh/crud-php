<?php 

//render halaman manjeadi json
header('Content-Type: application/json');
require '../config/app.php';

parse_str(file_get_contents('php://input'), $put);


//menerima input
$id_barang = $put['id_barang'];
$nama      = $put['nama'];
$jumlah    = $put['jumlah'];
$harga     = $put['harga'];

//check validasi data
if ($nama == null) {
    echo json_encode(['pesan'=> 'nama barang tidak boleh kosong']);
    exit;
}


//query tambah data
  $query = "UPDATE barang SET nama ='$nama', jumlah ='$jumlah', harga = '$harga'WHERE id_barang =
  '$id_barang'";
mysqli_query($db, $query);

//cek staatus data
if ($query) {
    echo json_encode(['pesan' => 'data barang behasil di ubah']);
} else {
    echo json_encode(['pesan'=> 'data barang gagal di tambahkan']);
}


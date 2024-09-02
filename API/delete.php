<?php 

//render halaman manjeadi json
header('Content-Type: application/json');
require '../config/app.php';

//mnerima request put/delete
parse_str(file_get_contents('php://input'), $delete);

//manerima input id data yang akan di hapus 
$id_barang = $delete['id_barang'];

//query hapus data
$query = "DELETE FROM barang WHERE id_barang = $id_barang";
mysqli_query($db, $query);

//cek staatus data
if ($query) {
    echo json_encode(['pesan' => 'data barang behasil di hapus']);
} else {
    echo json_encode(['pesan'=> 'data barang gagal di tambahkan']);
}


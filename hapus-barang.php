<?php
session_start();
//membatasi halaman login
 if (!isset($_SESSION["login"])) {
      echo "<script>
      alert('login lah boy');
          document.location.href ='login.php';
      </script>";
      exit;
 }
$title = 'Hapus Barang';

include 'config/app.php';
//menerima id barang yang akan di piih pengguna

$id_barang = (int)$_GET['id_barang'];

if(delete_barang($id_barang)>0){
    echo 
    "<script>
    alert ('data barang berhasil di hapus');
    document.location.href = 'index.php'
    </script>";

}else{
    echo "<script>
    alert ('data barang gagal di hapus');
    document.location.href = 'index.php'
    </script>";
}
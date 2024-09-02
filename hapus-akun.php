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
$title = 'Hapus akun';

include 'config/app.php';
//menerima id akun yang akan di piih pengguna

$id_akun = (int)$_GET['id_akun'];

if(delete_akun($id_akun)> 0){
    echo 
    "<script>
    alert ('data akun berhasil di hapus');
    document.location.href = 'crud-modal.php'
    </script>";

}else{
    echo "<script>
    alert ('data akun gagal di hapus');
    document.location.href = 'crud-modal.php'
    </script>";
}
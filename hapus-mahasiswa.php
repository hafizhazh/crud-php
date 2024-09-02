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
$title = 'Hapus mahasiswa';

include 'config/app.php';
//menerima id mahasiswa yang akan di piih pengguna

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

if(delete_mahasiswa($id_mahasiswa)>0){
    echo 
    "<script>
    alert ('data mahasiswa berhasil di hapus');
    document.location.href = 'mahasiswa.php'
    </script>";

}else{
    echo "<script>
    alert ('data mahasiswa gagal di hapus');
    document.location.href = 'mahasiswa.php'
    </script>";
}
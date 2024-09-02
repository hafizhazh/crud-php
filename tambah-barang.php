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

$title = 'Tambah Barang';


include 'layout/header.php';


//cek apakah tombol tambah di tekan

if(isset($_POST['tambah'])){
    if(create_barang($_POST) > 0){
        echo "
        <script>
        alert('data barang berhasil di tambahkan');
        document.location.href='index.php';
        </script>
        ";

    }else {
        echo "
        <script>
        alert('data barang gagal di tambahkan');
        document.location.href='index.php';
        </script>
        ";
    }
}
?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-plus"></i>Tambah barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">data barang</a></li>
              <li class="breadcrumb-item active">Tambah barang</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <div class="content"
       <div class="container-fluid">  
      <form action="" method="post">
            <div class="mb-3">
  <label for="nama" class="form-label">Nama Barang</label>
  <input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama barang"
  required>
</div>

<div class="mb-3">
  <label for="Jumlah" class="form-label">Jumlah Barang</label>
  <input type="number" class="form-control" id="Jumlah" name="jumlah" placeholder="masukan Jumlah barang"
  required>
</div>


<div class="mb-3">
  <label for="Harga" class="form-label">Jumlah Barang</label>
  <input type="number" class="form-control" id="Harga" name="harga" placeholder="masukan harga barang"
  required>
</div>


<button type="submit" name="tambah" class="btn btn-primary" style="float:right;">Tambah</button>

        </form>
      </div>
</section>
</div>

<?php 
include 'layout/footer.php';
?>
